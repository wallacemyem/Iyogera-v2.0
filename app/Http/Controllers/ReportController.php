<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Section;
use App\Enroll;
use App\Mark;
use App\Subject;
use App\Classes;
use App\Exam;
use App\Grade;
use App\Result;
use App\Student;
//use Brian2694\Toastr\Facades\Toastr;

class ReportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

    	$exam_id = $request->exam_id;   
    	$title = 'Marks Reports';
    	$sexy = Result::where(['exam_id' => $exam_id])->exists();

    	return view('backend.'.Auth::user()->role.'.report.student', compact('title', 'sexy'));

    }

    public function list( Request $request )
    {

    	# code...
    	$exam_id = $request->exam_id;   
        $section_id = $request->section_id;
        $section  = Section::find($section_id);
        $class_id = $section->class_id;
        $running_session = get_schools();
        $school_id = school_id();

        $class          = Classes::find($class_id);
        //$section        = Section::find($InputSectionId);
        $exam           = Exam::find($exam_id);

        $class_name = $class->name;
		$exam_name = $exam->name;
		//dd($section);
		
		

		        $subject = Subject::where(['class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		        
		        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		        //dd($students);
		        	//all subject list in a specific class/section
		            $subject_ids        = [];
		            $subject_strings    = '';
		            $marks_string       = '';
		            foreach ($students as $SingleStudent) {
		                foreach ($subject as $subjects) {
		                	//dd($SingleStudent->student_id);
		                	$stu_id = $SingleStudent->id;
		                    $sub_id = $subjects->id;
		                    //dd($students);
		                    $subject_strings    = (empty($subject_strings)) ? $subjects->name : $subject_strings . ',' . $subjects->name;
		                    //dd($subject_strings);
		                    $getMark            =  Mark::where(['student_id' => $stu_id, 'subject_id' => $sub_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->first();

		                    $marks            =  Mark::where(['student_id' => $stu_id, 'subject_id' => $sub_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();

		                    	//dd($getMark);
		                    if (empty($getMark->mark_total)) {
		                        $FinalMarks = 0;
		                    } else {
		                        $FinalMarks = $getMark->mark_total;
		                    }
		                    $marks_string = (empty($marks_string)) ? $FinalMarks : $marks_string . ',' . $FinalMarks;
		                   //dd($marks_string); 

		                }
		            
		                //end subject list for specific section/class
		                $sexy = Result::where(['student_id' => $stu_id])->exists();
						//dd($sexy);
		                //$alldata = Result::where(['exam_id' => $exam_id, 'class_id' => $class_id])->get();
		                //dd($alldata);

		            $result = Mark::where(['student_id' => $stu_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		            //dd(collect($yourArray)->sortBy('Key','ASC'));

		            $total_marks = Mark::where(['student_id' => $stu_id, 'section_id' => $section_id, 'class_id' => $class_id, 'exam_id' => $exam_id, 'session' => $running_session, 'school_id' => $school_id])->sum('mark_total');

		            	$sum_of_mark = ($total_marks == 0) ? 0 : $total_marks;
		            	//dd($sum_of_mark);
		            	$marks_count = $result->count();
		                $average_Mark = ($total_marks == 0) ? 0 : ($total_marks / $result->count()); //get average number 
		                //dd($average_Mark);
						$average_mark = number_format($average_Mark, 2, '.', '');
						
						$full_name          =   $SingleStudent->student->user->name;                 //get name 
		                $admission_no       =   $SingleStudent->student->code;           //get admission no
		        		
		            
		        	}
		            //end loop eligible_students
        		
           
	            $allresult_data = Result::where(['student_id' => $stu_id, 'session' => $running_session, 'school_id' => $school_id, 'exam_id' => $exam_id, 'class_id' => $class_id, 'section_id' => $section_id])->orderBy('position', 'asc')->get();
	          
        return view('backend.'.Auth::user()->role.'.report.list', compact('students', 'stu_id', 'exam_id', 'subject', 'subjects', 'section_id', 'class_id', 'running_session', 'school_id', 'marks', 'section', 'total_marks', 'marks_count', 'allresult_data'))->render();
    } 
    /*
    Schema::connection('mysql')->create('mytable_'.$id, function($table)
    {
        $table->increments('id');
        $table->timestamps();
    });
    */ 
    public function generate(Request $request)
    {
    	# code...
    	$exam_id 			= $request->exam_id;   
        $section_id 		= $request->section_id;
        $section  			= Section::find($section_id);
        $class_id 			= $section->class_id;
        $running_session 	= get_schools();
        $school_id 			= school_id();

        $class          	= Classes::find($class_id);
        //$section        = Section::find($InputSectionId);
        $exam           	= Exam::find($exam_id);

        $class_name 		= $class->name;
		$exam_name 			= $exam->name;
		//dd($section);
		//$sexy = Result::where(['student_id' => $student_id])->exists();
		//dd(!$sexy);
		

		        $subject = Subject::where(['class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		        
		        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		        //dd($students);
		        	//all subject list in a specific class/section
		            $subject_ids        = [];
		            $subject_strings    = '';
		            $marks_string       = '';
		            foreach ($students as $SingleStudent) {
		                foreach ($subject as $subjects) {
		                	
		                	$stu_id = $SingleStudent->id;
		                    $sub_id = $subjects->id;
		                    //dd($students);
		                    $subject_strings    = (empty($subject_strings)) ? $subjects->name : $subject_strings . ',' . $subjects->name;
		                    //dd($subject_strings);
		                    $getMark            =  Mark::where(['student_id' => $stu_id, 'subject_id' => $sub_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->first();

		                    $marks            =  Mark::where(['student_id' => $stu_id, 'subject_id' => $sub_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();

		                    	//dd($getMark);
		                    if (empty($getMark->mark_total)) {
		                        $FinalMarks = 0;
		                    } else {
		                        $FinalMarks = $getMark->mark_total;
		                    }
		                    $marks_string = (empty($marks_string)) ? $FinalMarks : $marks_string . ',' . $FinalMarks;
		                   //dd($marks_string); 
		                }
		            
		                //end subject list for specific section/class


		            $result = Mark::where(['student_id' => $stu_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
		            //dd(collect($yourArray)->sortBy('Key','ASC'));

		            $total_marks = Mark::where(['student_id' => $stu_id, 'section_id' => $section_id, 'class_id' => $class_id, 'exam_id' => $exam_id, 'session' => $running_session, 'school_id' => $school_id])->sum('mark_total');

		            	$sum_of_mark = ($total_marks == 0) ? 0 : $total_marks;
		            	//dd($sum_of_mark);
		            	$marks_count = $result->count();
		                $average_Mark = ($total_marks == 0) ? 0 : ($total_marks / $result->count()); //get average number 
		                //dd($average_Mark);
						$average_mark = number_format($average_Mark, 2, '.', '');
						
						$full_name          =   $SingleStudent->student->user->name;                 //get name 
		                $admission_no       =   $SingleStudent->student->code;           //get admission no
		                
		        		

		           			$insert_results                     = new Result;
			        		$insert_results->student_id       	= $stu_id;
			                $insert_results->student_name       = $full_name;
			                $insert_results->student_code       = $admission_no;
			                $insert_results->subjects    		= $subject_strings;
			                $insert_results->marks_string       = $marks_string;
			                $insert_results->total_marks        = $sum_of_mark;
			                $insert_results->average       		= $average_mark;
			                $insert_results->section_id         = $section_id;
			                $insert_results->class_id           = $class_id;
			                $insert_results->exam_id            = $exam_id;
			                $insert_results->session            = $running_session;
			                $insert_results->school_id          = $school_id;                //if (!$sexy){
			                $insert_results->save();
			                
			                
		           		
			                $subject_strings = "";
			                $marks_string = "";
			                $total_marks = 0;
			                $average = 0;
			                $admission_no = 0;
			                $full_name = "";
		            
		        	}
		            //end loop eligible_students
        		
           
	            $allresult_data = Result::where(['exam_id' => $exam_id, 'class_id' => $class_id])->orderBy('average', 'desc')->get();
	            //dd($allresult_data);
	            $merit_serial = 1;
	            foreach ($allresult_data as $row) {
	                $D = Result::find($row->id);
	                $D->position = $merit_serial++;
	                $D->save();
	            
	            	}
	            	return $data;
    }

    public function print( Request $request)
    {
    	$exam_id 			= $request->exam_id;   
        $session_id 		= $request->session_id;
        //$section  			= Section::find($section_id);
        //$class_id 			= $section->class_id;
    	$id = Auth::user()->id;
    	$student = Student::where(['user_id' => $id])->get();
    	foreach ( $student as $key ) {
    		# code...
    	}
    	$student_id = $key->id;
    	$class = Enroll::where(['student_id' => $student_id])->get();
    	foreach ($class as $key2) {
    		# code...
    	}
    	$class_id 	= $key2->class_id;
    	$section_id = $key2->section_id;
    	$section  	= Section::find($section_id);
    	//$section_name = $section->name;
    	//$subject_id = 
    	//dd($section_name);
    	$subject = Subject::where(['class_id' => $class_id, 'session' => $session_id, 'school_id' => school_id()])->get();
    	foreach ($subject as $key3) {
    		# code...
    	}
    	//dd($key3->id);
    	$subject_id = $key3->id;

    	$result = Mark::where(['subject_id' => $subject_id, 'section_id' => $section_id, 'class_id' => $class_id, 'session' => get_schools(), 'school_id' => school_id()])->get();

    	

    	$allresult_data = Result::where(['student_id' => $student_id, 'session' => $session_id, 'exam_id' => $exam_id, 'class_id' => $class_id])->orderBy('position', 'asc')->get();
    	foreach ($allresult_data as $key4) {
    		# code...
    	}
    	//dd($subject);
    	
    	return view('backend.'.Auth::user()->role.'.report.list', compact('allresult_data', 'result', 'subject', 'class_id', 'subject_id', 'student_id', 'exam_id', 'session_id', 'section', 'section_id', 'key4', 'key3'))->render();
    }
}
