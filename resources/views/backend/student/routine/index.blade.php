@extends('backend.layout.main')
@section('content')
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-calendar-today title_icon"></i> {{ translate('class_routine') }}
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <table class="table table-striped table-bordered table-centered mb-0">
        <tbody>
            @php
                $id = Auth::user()->id;
                $student = App\Student::where(['user_id' => $id])->get();
                foreach ( $student as $key ) {
                # code...
                }
                $student_id = $key->id;
                $enroll = App\Enroll::where(['student_id' => $student_id])->get();
                foreach ( $enroll as $key2){

                }
                $class_id = $key2->class_id;
                $section_id = $key2->section_id;
            @endphp
            <tr>
                <td style="font-weight: bold; width : 100px;">{{ translate('saturday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'saturday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
            
            <tr>
                <td style="font-weight: bold;">{{ translate('monday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'monday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('tuesday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'tuesday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('wednesday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'wednesday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('thursday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'thursday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('friday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_schools(), 'school_id' => school_id(), 'day' => 'friday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            
                        </div>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endsection

