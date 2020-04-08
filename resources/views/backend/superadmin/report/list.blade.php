
@if (isset($students))
    @if (count($students) > 0)
        @php
            $section = \App\Section::find($section_id);
            $subject = \App\Subject::find($subject_id);
        @endphp
        @php
            $enroll_details = \App\Enroll::where(['student_id' => $student_details->id, 'session' => get_settings('running_session'), 'school_id' => school_id()])->get();
            $class_details = \App\Classes::find($enroll_details[0]->class_id);
            $section_details = \App\Section::find($enroll_details[0]->section_id);
            $parent_info = \App\User::find($student_details->parent_id);
        @endphp

<div class="row">
            <div class="col-lg-12">
                <div class="white-box">

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single-report-admit">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div>
                                            <img class="logo-img" src="{{'backend/images/logo-dark.png'}}" alt="">
                                            </div>
                                            <div class="ml-30">
                                                <h3 class="text-white"> just test </h3> 
                                                <p class="text-white mb-0"> test </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3>@lang('lang.order_of_merit_list')</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p class="mb-0">
                                                                @lang('lang.academic_year') : <span class="primary-color fw-500">{{ get_settings(running_session) }}</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                @lang('lang.exam') : <span class="primary-color fw-500">{{$exam_name}}</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                @lang('lang.class') : <span class="primary-color fw-500">{{$class_name}}</span>
                                                            </p>
                                                            <p class="mb-0">
                                                                @lang('lang.section') : <span class="primary-color fw-500">{{$section->section_name}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>@lang('lang.subjects')</h3>
                                                    <div class="row">
                                                        <div class="col-md-12 w-100" style="columns: 2">
                                                            @foreach($assign_subjects as $subject)
                                                            <p class="mb-0">
                                                                <span class="primary-color fw-500">{{$subject->subject->subject_name}}</span>
                                                            </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="table-responsive">
                                            
                                        <table class="w-100 mt-30 mb-20 table table-bordered meritList">
                                            <thead>
                                                <tr>
                                                    <th>Merit @lang('lang.position')</th>
                                                    <th>@lang('lang.admission') @lang('lang.no')</th>
                                                    <th>@lang('lang.student')</th>
                                                    @foreach($subjectlist as $subject)
                                                    <th>{{$subject}}</th>
                                                    @endforeach

                                                    <th>@lang('lang.total_mark')</th>
                                                    <th>@lang('lang.average')</th>
                                                    <th>@lang('lang.gpa')</th>
                                                    <th>@lang('lang.result')</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $i=1; $subject_mark = []; $total_student_mark = 0; @endphp
                                                @foreach($allresult_data as $row) 
                                                <tr>
                                                    <td>{{$row->merit_order}}</td>
                                                    <td>{{$row->admission_no}}</td>
                                                    <td style="text-align:left !important;" nowrap >{{$row->student_name}}</td>

                                                    @php $markslist = explode(',',$row->marks_string);@endphp  
                                                    @if(!empty($markslist))
                                                        @foreach($markslist as $mark)
                                                            @php 
                                                                $subject_mark[]= $mark;
                                                                $total_student_mark = $total_student_mark + $mark; 
                                                            @endphp 
                                                            <td>  {{!empty($mark)?$mark:0}}</td> 
                                                        @endforeach
                                                     
                                                    @endif



                                                    <td>{{$total_student_mark}} </td>
                                                    <td>{{!empty($row->average_mark)?$row->average_mark:0}} @php $total_student_mark=0; @endphp </td> 
                                                    <td>
                                                        <?php 
                                                            $total_grade_point = 0;
                                                            $number_of_subject = count($subject_mark); 
                                                            foreach ($subject_mark as $mark) {
                                                                $grade_gpa = DB::table('sm_marks_grades')->where('percent_from','<=',$mark)->where('percent_upto','>=',$mark)->first();
                                                                $total_grade_point = $total_grade_point + $grade_gpa->gpa;
                                                            }
                                                            if($total_grade_point==0){
                                                                echo '0.00';
                                                            }else{
                                                                if($number_of_subject  == 0){
                                                                    echo '0.00';
                                                                }else{
                                                                    echo number_format((float)$total_grade_point/$number_of_subject, 2, '.', '');
                                                                } 
                                                            }

                                                        ?>
                                                        

                                                    </td> 
                                                    <td> 
                                                        {{$row->result}}
                                       
                                                    </td>
                                                </tr> 

                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>

                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div style="text-align: center;">
                <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
                <p>{{ translate('no_data_found') }}</p>
            </div>
        @endif
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
    </div>
@endif