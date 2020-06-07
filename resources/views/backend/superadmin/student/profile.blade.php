@php
    $enroll_details = \App\Enroll::where(['student_id' => $student_details->id, 'session' => get_schools(), 'school_id' => school_id()])->get();
    $class_details = \App\Classes::find($enroll_details[0]->class_id);
    $section_details = \App\Section::find($enroll_details[0]->section_id);
    $parent_info = \App\User::find($student_details->parent_id);
@endphp

<div class="h-100">
    <div class="row align-items-center h-100">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="text-center">
                @if (file_exists('backend/images/student_image/'.$student_details->profile_pix.'.jpg'))
                    <img src="{{'backend/images/student_image/'.$student_details->profile_pix.'.jpg'}}" alt="" height="150" width="150">
                @else
                    <img src="{{ asset('backend/images/student_image/preview.png') }}" alt="" height="150" width="150">
                @endif
                <div> <span style="font-weight: bold;">{{ translate('name') }}: </span> {{ $student_details->user->other_name }} {{ $student_details->user->first_name }} {{ $student_details->user->middle_name }} </div>
                <div> <span style="font-weight: bold;">{{ translate('student_code') }}: </span> {{ $student_details->code }} </div>
                <div> <span style="font-weight: bold;">{{ translate('student_email') }}: </span> {{ $student_details->user->email }} </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{ translate('profile') }}</a>
                </li>
                
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;">{{ translate('name') }}:</td>
                                <td>{{ $student_details->user->other_name }} {{ $student_details->user->first_name }} {{ $student_details->user->middle_name }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">{{ translate('class') }}:</td>
                                <td>
                                    {{ $class_details->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">{{ translate('section') }}:</td>
                                <td>
                                    {{ $section_details->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>


