<?php

namespace App\Http\Controllers;

use App\Student;
use App\School;
use App\Setting;
use App\Section;
use App\Enroll;
use App\Invoice;
use App\User;
use App\Mark;
use Hash;
use Auth;
use Session;
//suse App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$auth = school_id(); //Auth::user()->school_id;
        //dd($auth);

        $title = translate('👩‍🎓');
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
        //dd(microtime(true));
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
        $file_name_path = $short."".$year."".$rad_code;
        //dd($std_code);
        if ($request->hasFile('student_image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('student_image');
                $student_image->move($dir, $file_name_path.".jpg");
            }
            //dd($request->hasFile('student_image'));

        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->first_name = $request->first_name;
            $user->other_name = $request->other_name;
            $user->middle_name = $request->middle_name;
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
            $student->profile_pix = $file_name_path;
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

            
            
            flash(translate('student_added_successfully'))->success();
            
        }else {
            flash(translate('email_dublication'))->error();
        }

        return redirect()->back();
    }


    public function bulk_student_store(Request $request) {
        foreach($request->first_name as $key=> $row) {
            $selected_branch_id = school_id();
            $selected_branch = \App\School::find($selected_branch_id);
            $short = $selected_branch->short;
            $year = date('Y');
            $email = "@iyogera.com";
            $rad_code = str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
            $std_code = $short."/".$year."/".$rad_code;
            $file_name_path = $short."".$year."".$rad_code;
            if($row != ""){
                if(count(User::where('email', $request->email[$key])->get()) == 0) {
                    $user = new User;
                    $user->first_name = $request->first_name[$key];
                    $user->other_name = $request->other_name[$key];
                    $user->middle_name = $request->middle_name[$key];
                    $user->email = $rad_code.$email;
                    $user->password = Hash::make($std_code);
                    $user->role = "student";
                    $user->phone = $selected_branch->phone;
                    $user->address = $selected_branch->address;
                    $user->gender = $request->gender[$key];
                    $user->school_id = school_id();
                    $user->save();

                    $user_id = $user->id;
                    $student = new Student;
                    $student->user_id = $user_id;
                    $student->code = $std_code;
                    $student->profile_pix = $file_name_path;
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

        flash(translate('student_added_successfully'))->success();
        return redirect()->back();
    }

    public function excel_student_store(Request $request) {
        if($request->class_id > 0 && $request->section_id > 0) {

            if ($request->hasFile('csv_file')) {

                $request->file('csv_file')->move('csv', 'bulk_student.csv');
                $csv = array_map('str_getcsv', file(asset('csv/bulk_student.csv')));
                $count = 1;
                $array_size = sizeof($csv);
                //dd($count);

             foreach ($csv as $row) {
                $selected_branch_id = school_id();
                $selected_branch = School::find($selected_branch_id);
                $short = $selected_branch->short;
                $year = date('Y');
                $email = "@iyogera.com";
                $rad_code = str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
                $std_code = $short."/".$year."/".$rad_code;
                $file_name_path = $short."".$year."".$rad_code;
                  if ($count == 1) {
                      $count++;
                      continue;
                  }
                  $password = $std_code;

                  $name      = $row[0];
                  $email     = $rad_code.$email;
                  //$password  = Hash::make($row[2]);
                  $phone     = $row[1];
                  //$parent_id = $row[4];
                  $gender    = strtolower($row[2]);

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
                    $student->code = $std_code;
                    $student->profile_pix = $file_name_path;
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
                'notification' => translate('you_must_select_class_and_section')
            );
        }
        return $data;

    }

    public function generate_csv_file() 
    {
        $file   = fopen("csv/bulk_student.csv", "w");
        $line   = array('StudentName', 'Phone', 'Gender');
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
        $running_session = get_schools();
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
        $std_code = $student->profile_pix;
        //dd($std_code);
        
        $user    = User::find($student->user_id);
        $query   = Enroll::where(array('student_id' => $id, 'session' => get_schools()))->first();
        $enroll  = Enroll::find($query->id);
        
        if(count(User::where('email', $request->name)->where('id', '!=', $student->user->id)->get()) == 0) {

            if ($request->hasFile('image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('image');
                $student_image->move($dir, $std_code.".jpg");
            }
            //dd($request->kiss);

            $user->first_name = $request->first_name;
            $user->other_name = $request->other_name;
            $user->middle_name = $request->middle_name;
            $user->email = $request->kiss;
            $user->role = "student";
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = school_id();
            $user->save();

            $student->profile_pix = $std_code;
            $student->school_id = school_id();
            $student->save();

            $enroll->class_id = $request->class_id;
            $enroll->section_id = $request->section_id;
            $enroll->school_id = school_id();
            $enroll->session = get_schools();
            $enroll->save();

        }

        //return view('backend.'.Auth::user()->role.'.student.edit')->with(flash('Generated Successfully')->success());
        flash('Student Edit Successful')->success();
        return redirect ('student/'.$id.'/edit');
        //flash('Generated Successfully')->success();
        //;
    }

    /**
    flash(translate('welcome_back').' '.$user->name)->success();
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
        $enroll = Enroll::where(array('student_id' => $id, 'session' => get_schools()))->first();
        $section_id = $enroll->section_id;
        $enroll->delete();

        flash(translate('student_has_been_delected_successfully'))->success();
        return redirect('student');
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
