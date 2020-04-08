
<?php

namespace App\Http\Controllers;

use App\Student;
use App\School;
use App\Setting;
use App\Section;
use App\Enroll;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$auth = school_id(); //Auth::user()->school_id;
        //dd($auth);

        $title = translate('student_list');
        return view('backend.'.Auth::user()->role.'.student.index', compact('title' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$rad_code = str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
        
        //dd($rad_code.$email);
        $title = translate('student_admission');
        $type = 'single';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
    }

    public function bulk_student_create()
    {
        $title = translate('student_admission');
        $type = 'bulk';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
    }

    public function excel_student_create()
    {
        $title = translate('student_admission');
        $type = 'excel';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = request()->validate([
        //         'name'       => 'required',
        //         'email'      => 'required',
        //         'password'   => 'required',
        //         'parent_id'  => 'required',
        //         'address'    => 'required',
        //         'phone'      => 'required',
        //         'birthday'   => 'required',
        //         'code'       => 'required',
        //         'class_id'   => 'required',
        //         'section_id' => 'required',
        //         'gender'     => 'required'
        //     ]);

        //$schools_short = Schools::where('short');
        $selected_branch_id = school_id();
        $selected_branch = \App\School::find($selected_branch_id);
        $short = $selected_branch->short;
        $year = date('Y');
        $email = "@iyogera.com";
        $rad_code = str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
        $std_code = $short."/".$year."/".$rad_code;
        //dd($std_code);

        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $rad_code.$email;
            $user->password = Hash::make($std_code);
            $user->role = "student";
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = school_id();
            $user->save();

            $user_id = $user->id;
            $student = new Student;
            $student->user_id = $user_id;
            $student->code = $std_code;
            //$student->parent_id = $request->parent_id;
            $student->school_id = school_id();
            $student->save();
            $student_id = $student->id;

            $enroll = new Enroll;
            $enroll->student_id = $student_id;
            $enroll->class_id = $request->class_id;
            $enroll->section_id = $request->section_id;
            $enroll->school_id = school_id();
            $enroll->session = get_schools();
            $enroll->save();

            if ($request->hasFile('student_image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('student_image');
                $student_image->move($dir, $student_id.".jpg");
            }

            $data = array(
                'status' => true,
                'notification' => translate('student_added_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('email_duplication')
            );
        }

        return $data;
    }


    public function bulk_student_store(Request $request) {
        foreach($request->name as $key=> $row) {
            $selected_branch_id = school_id();
            $selected_branch = \App\School::find($selected_branch_id);
            $short = $selected_branch->short;
            $year = date('Y');
            $email = "@iyogera.com";
            $rad_code = str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
            $std_code = $short."/".$year."/".$rad_code;
            if($row != ""){
                if(count(User::where('email', $request->email[$key])->get()) == 0) {
                    $user = new User;
                    $user->name = $request->name[$key];
                    $user->email = $rad_code.$email;
                    $user->password = Hash::make($std_code);
                    $user->role = "student";
                    //$user->phone = $request->phone[$key];
                    $user->gender = $request->gender[$key];
                    $user->school_id = school_id();
                    $user->save();

                    $user_id = $user->id;
                    $student = new Student;
                    $student->user_id = $user_id;
                    $student->code = $std_code;
                    //$student->parent_id = $request->parent_id[$key];
                    $student->school_id = school_id();
                    $student->save();
                    $student_id = $student->id;

                    $enroll = new Enroll;
                    $enroll->student_id = $student_id;
                    $enroll->class_id = $request->class_id;
                    $enroll->section_id = $request->section_id;
                    $enroll->school_id = school_id();
                    $enroll->session = get_schools();
                    $enroll->save();
                }
                else{
                    flash($request->email[$key].' already exist')->error();
                }
            }
        }

        $data = array(
            'status' => true,
            'notification' => translate('student_added_successfully')
        );
        return $data;
    }

    public function excel_student_store(Request $request) {
        if($request->class_id > 0 && $request->section_id > 0) {

            if ($request->hasFile('csv_file')) {

                $request->file('csv_file')->move('csv', 'bulk_student.csv');
                $csv = array_map('str_getcsv', file(asset('csv/bulk_student.csv')));
                $count = 1;
                $array_size = sizeof($csv);

             foreach ($csv as $row) {
                  if ($count == 1) {
                      $count++;
                      continue;
                  }
                  $password = $row[3];

                  $name      = $row[0];
                  $email     = $row[1];
                  $password  = Hash::make($row[2]);
                  $phone     = $row[3];
                  $parent_id = $row[4];
                  $gender    = strtolower($row[5]);

                  if(count(User::where('email', $email)->get()) == 0) {
                    $user = new User;
                    $user->name = $name;
                    $user->email = $email;
                    $user->password = Hash::make($password);
                    $user->role = "student";
                    $user->phone = $phone;
                    $user->gender = $gender;
                    $user->school_id = school_id();
                    $user->save();

                    $user_id = $user->id;
                    $student = new Student;
                    $student->user_id = $user_id;
                    $student->code = substr(md5(uniqid(rand(), true)), 0, 7);
                    $student->parent_id = $parent_id;
                    $student->school_id = school_id();
                    $student->save();
                    $student_id = $student->id;

                    $enroll = new Enroll;
                    $enroll->student_id = $student_id;
                    $enroll->class_id = $request->class_id;
                    $enroll->section_id = $request->section_id;
                    $enroll->school_id = school_id();
                    $enroll->session = get_schools();
                    $enroll->save();
                }
                else{
                    flash($email.' already exist')->error();
                }
              }
            }
        $data = array(
            'status' => true,
            'notification' => translate('student_added_successfully')
        );
        }else {
            $data = array(
                'status' => false,
                'view' => "",
                'notification' => translate('you_must_have_to_select_class_and_section')
            );
        }
        return $data;

    }

    public function generate_csv_file() {
        $file   = fopen("csv/bulk_student.csv", "w");
        $line   = array('StudentName', 'Email', 'Password', 'Phone', 'ParentID', 'Gender');
        fputcsv($file, $line, ',');
        echo $file_path = asset('csv/bulk_student.csv');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($section_id)
    {
        $section  = Section::find($section_id);
        $class_id = $section->class_id;
        $running_session = get_settings('running_session');
        $school_id = school_id();
        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        return view('backend.'.Auth::user()->role.'.student.list', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('backend.'.Auth::user()->role.'.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $std_code = $student->id;
        //dd($std_code);
        $user    = User::find($student->user_id);
        $query   = Enroll::where(array('student_id' => $id, 'session' => get_schools()))->first();
        $enroll  = Enroll::find($query->id);
        if(count(User::where('email', $request->email)->where('id', '!=', $student->user->id)->get()) == 0) {

            $user->name = $request->name;
            //$user->email = $request->email;
            $user->role = "student";
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = school_id();
            $user->save();

            //$student->parent_id = $request->parent_id;
            $student->school_id = school_id();
            $student->save();

            $enroll->class_id = $request->class_id;
            $enroll->section_id = $request->section_id;
            $enroll->school_id = school_id();
            $enroll->session = get_schools();
            $enroll->save();

            if ($request->hasFile('student_image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('student_image');
                $student_image->move($dir, $std_code.".jpg");
            }

            $student = Student::find($id);
            $data = array(
                'status' => true,
                'notification' => translate('student_updated_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('email_duplication')
            );
        }

        return redirect ('student/'.$id.'/edit')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        $user = User::find($student->user->id);
        $user->delete();
        $enroll = Enroll::where(array('student_id' => $id, 'session' => get_settings('running_session')))->first();
        $enroll->delete();
        return array(
            'status' => true,
            'notification' => translate('student_has_been_deleted_successfully')
        );
    }

    function profile($student_id) {
        $student_details = Student::find($student_id);
        return view('backend.'.Auth::user()->role.'.student.profile', compact('student_details'));
    }


    function promotion() {
        return view('backend.'.Auth::user()->role.'.promotion.index');
    }

    function student_to_promote(Request $request) {
        $class_id_to = $request->class_id_to;
        $class_id_from = $request->class_id_from;
        $session_to = $request->session_to;
        $session_from = $request->session_from;
        $school_id = school_id();
        $students = Enroll::where(['class_id' => $class_id_from, 'session' => $session_from, 'school_id' => $school_id])->get();
        return view('backend.'.Auth::user()->role.'.promotion.student', compact('class_id_to', 'class_id_from', 'session_to', 'session_from', 'students'))->render();
    }

    function promote($promotion_data) {
        $promotion_data = explode('-', $promotion_data);
        $enroll_id = $promotion_data[0];
        $class_id = $promotion_data[1];
        $session_id = $promotion_data[2];
        $enroll = Enroll::find($enroll_id);
        $enroll->class_id = $class_id;
        $enroll->session = $session_id;
        $section_id = Section::where('class_id', $class_id)->pluck('id')->first();
        $enroll->section_id = $section_id;
        $enroll->save();
    }
}
