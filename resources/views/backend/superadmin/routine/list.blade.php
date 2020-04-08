@if (isset($class_id) && isset($section_id))
    <table class="table table-striped table-bordered table-centered mb-0">
        <tbody>
            <tr>
                <td style="font-weight: bold; width : 100px;">{{ translate('saturday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'saturday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                            <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('sunday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'sunday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('monday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'monday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('tuesday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'tuesday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('wednesday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'wednesday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('thursday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'thursday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">{{ translate('friday') }}</td>
                <td>
                    @foreach (App\Routine::where(['class_id' => $class_id, 'section_id' => $section_id, 'session' => get_settings('running_session'), 'school_id' => school_id(), 'day' => 'friday'])->get() as $routine)
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i> {{ \App\Subject::where('id', $routine->subject_id)->pluck('name')->first() }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i> {{ $routine->starting_hour.':'.$routine->starting_minute.' - '.$routine->ending_hour.':'.$routine->ending_minute }}</p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i> {{ App\Teacher::find($routine->teacher_id)->user->name }} </p>
                                <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i> {{ App\ClassRoom::find($routine->room_id)->name }}</p>
                            <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="showAjaxModal('{{ route('routine.edit', $routine->id) }}', 'Update Class Routine')">{{ translate('edit') }}</a>
                                <a class="dropdown-item" onclick="confirm_modal('{{ route('routine.destroy', $routine->id) }}', getClassRoutine )">{{ translate('delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif

<style>
    .dropdown-toggle::after{
        display: none;
    }
</style>
