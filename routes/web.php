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
    Route::get('generate' , 'ReportController@generateIndex')->name('generate');
    Route::post('report_printa' , 'ReportController@printa4')->name('report.printa');
    Route::post('report_list', 'ReportController@list')->name('report.list');
    Route::post('report_generate', 'ReportController@generate')->name('report.generate');

    //Office365
    Route::get('login/auth/office365', 'OfficeController@signin')->name('login.auth.office365');
    Route::get('redirect', 'OfficeController@redirect')->name('redirect');

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

    //lesson
    Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
    //Route::post('course/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
    Route::post('course/{course_id}/rating', ['uses' => 'CoursesController@rating', 'as' => 'courses.rating']);

    Route::get('lesson/{course_id}/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);
    Route::post('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);

    //lesson admin

    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
    Route::resource('lessons', 'Admin\LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'Admin\LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::post('lessons_restore/{id}', ['uses' => 'Admin\LessonsController@restore', 'as' => 'lessons.restore']);
    Route::delete('lessons_perma_del/{id}', ['uses' => 'Admin\LessonsController@perma_del', 'as' => 'lessons.perma_del']);
    Route::resource('questions', 'Admin\QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'Admin\QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::post('questions_restore/{id}', ['uses' => 'Admin\QuestionsController@restore', 'as' => 'questions.restore']);
    Route::delete('questions_perma_del/{id}', ['uses' => 'Admin\QuestionsController@perma_del', 'as' => 'questions.perma_del']);
    Route::resource('questions_options', 'Admin\QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'Admin\QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::post('questions_options_restore/{id}', ['uses' => 'Admin\QuestionsOptionsController@restore', 'as' => 'questions_options.restore']);
    Route::delete('questions_options_perma_del/{id}', ['uses' => 'Admin\QuestionsOptionsController@perma_del', 'as' => 'questions_options.perma_del']);
    Route::resource('test', 'Admin\TestsController');
    Route::post('tests_mass_destroy', ['uses' => 'Admin\TestsController@massDestroy', 'as' => 'tests.mass_destroy']);
    Route::post('tests_restore/{id}', ['uses' => 'Admin\TestsController@restore', 'as' => 'tests.restore']);
    Route::delete('tests_perma_del/{id}', ['uses' => 'Admin\TestsController@perma_del', 'as' => 'tests.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

    //end lesson admin

    #live lessons
    Route::resource('live_lessons', 'Livelessons');
    Route::get('lesson_s', 'Livelessons@home')->name('lesson.s');
    Route::get('live_lesson_list', 'Livelessons@list')->name('live_lesson_list.list');
    Route::post('live_lesson_start', 'Livelessons@meetup')->name('live_lesson_start.meetup');
    Route::get('live_lesson_start', 'Livelessons@meetup')->name('live_lesson_start.meetup');

});

Auth::routes();
Route::get('login', 'Auth\LoginController@signon')->name('login');    
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

