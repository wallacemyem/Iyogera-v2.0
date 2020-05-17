<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $title = "Dashboard";
        return view('backend.'.Auth::user()->role.'.dashboard.dashboard', compact('title'));
    })->name('dashboard');

    Route::get('/dash', function () {
        $title = "Dashboard";
        return view('backend.'.Auth::user()->role.'.dashboard.dashboard', compact('title'));
    })->name('dashboard');

    Route::resource('session_manager', 'SessionManagerController');
    Route::get('session_activate/{id}', 'SessionManagerController@active')->name('session.active');
    Route::get('session_list', 'SessionManagerController@list')->name('session.list');

    Route::resource('class', 'ClassController');
    Route::get('class_list', 'ClassController@list')->name('class.list');

    Route::resource('section', 'SectionController');
    Route::get('/section/destroy/{sectionId}', 'SectionController@destroy')->name('section.destroy');

    Route::resource('teacher', 'TeacherController');
    Route::get('teacher_permission/{teacher_id}', 'TeacherController@assigned_permissions')->name('teacher.permission');

    Route::resource('department', 'DepartmentController');
    Route::get('department_list', 'DepartmentController@list')->name('department.list');

    Route::resource('parent', 'ParentController');
    Route::get('parent_list', 'ParentController@list')->name('parent.list');

    Route::resource('accountant', 'AccountantController');
    Route::get('accountant_list', 'AccountantController@list')->name('accountant.list');

    Route::resource('librarian', 'LibrarianController');
    Route::get('librarian_list', 'LibrarianController@list')->name('librarian.list');

    Route::resource('permission', 'TeacherPermissionController');
    Route::post('assign_permission', 'TeacherPermissionController@assign_permission')->name('permission.assign');

    Route::resource('role', 'RoleController');
    Route::get('accessibility/{role}', 'RoleController@editAccessibility')->name('accessibility.edit');
    Route::patch('accessibility/{role}', 'RoleController@updateAccessibility')->name('accessibility.update');

    Route::resource('daily_attendance', 'DailyAttendanceController');
    Route::post('show_attendance', 'DailyAttendanceController@show')->name('daily_attendance.show_attendance');
    Route::post('student_list', 'DailyAttendanceController@students')->name('daily_attendance.students');

    Route::resource('subject', 'SubjectController');

    Route::resource('routine', 'RoutineController');
    Route::get('get_subject/{class_id}', 'RoutineController@subject')->name('routine.subject');

    Route::resource('room', 'ClassRoomController');
    Route::get('room_list', 'ClassRoomController@list')->name('room.list');

    Route::resource('pin', 'PinController');
    Route::get('pinlist', 'PinController@list')->name('pin.list');    
    Route::get('kie34nnsljusikajh_pin' , 'PinController@gpin')->name('generate.pin');
    Route::post('generate_pin' , 'PinController@generate')->name('pin.generate');

    Route::resource('book', 'BookController');
    Route::get('booklist', 'BookController@list')->name('book.list');

    Route::resource('book_issue', 'BookIssueController');
    Route::get('book_issue_list', 'BookIssueController@list')->name('book_issue.list');

    Route::get('student_list/{class_id}', 'BookIssueController@student')->name('book_issue.student');
    Route::delete('return_book/{book_id}', 'BookIssueController@return')->name('book_issue.return');

    Route::resource('exam', 'ExamController');
    Route::get('exam_list', 'ExamController@list')->name('exam.list');

    Route::resource('grade', 'GradeController');
    Route::get('grade_list', 'GradeController@list')->name('grade.list');

    Route::resource('mark', 'MarkController');
    Route::post('mark_list', 'MarkController@list')->name('mark.list');

    Route::resource('user', 'UserController');
    Route::post('user_list', 'UserController@list')->name('user.list');

    Route::resource('schools', 'SchoolController');
    Route::get('schools_list', 'SchoolController@list')->name('schools.list');
    Route::patch('schools_update/{id}', 'SchoolController@school_settings_update')->name('schools.update');

    Route::resource('syllabus', 'SyllabusController');
    Route::get('download_syllabus/{file}', 'SyllabusController@download')->name('syllabus.download');

    Route::resource('event_calendar', 'EventCalendarController');
    Route::get('event_calendar_list', 'EventCalendarController@list')->name('event_calendar.list');
    Route::get('event_calendar_all', 'EventCalendarController@all')->name('event_calendar.all');

    Route::resource('profile', 'ProfileController');

    Route::resource('report' , 'ReportController');
    Route::post('report_print' , 'ReportController@print')->name('report.print');
    Route::get('report_print' , 'ReportController@print')->name('report.print');
    Route::post('report_list', 'ReportController@list')->name('report.list');
    Route::post('report_generate', 'ReportController@generate')->name('report.generate');

    //paystack.co
    //Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    //Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    #rave flutterwave
    Route::post('/pay', 'RaveController@initialize')->name('pay');
    Route::post('/rave/callback', 'RaveController@callback')->name('callback');
    Route::get('/rave/callback', 'RaveController@callback')->name('callback');
    Route::post('/receivepayment', 'RaveController@webhook')->name('webhook');
    //Route::get('/receivepayment', 'RaveController@webhook')->name('webhook');
    Route::post('/verify', 'RaveController@verify')->name('verify');
    //Route::get('/verify', 'RaveController@verify')->name('verify');

    //jinx
    Route::resource('payment' , 'PaymentController');
    Route::get('/success', 'PaymentController@success')->name('success');
    Route::get('/fail', 'PaymentController@fail')->name('fail');

});

Auth::routes();
Route::get('login', 'Auth\LoginController@signon')->name('login');    
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

