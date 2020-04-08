@if (isset($students))
    @if (count($students) > 0)
        @php
            $class_from = \App\Classes::find($class_id_from);
            $class_to   = \App\Classes::find($class_id_to);
            $session_from_info   = \App\Session::find($session_from);
            $session_to_info   = \App\Session::find($session_to);
        @endphp
        <div class="row justify-content-md-center">
            <div class="col-md-4 mt-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="toll-free-box text-center">
                            <h4> <i class="mdi mdi-chart-bar-stacked"></i> {{ translate('promote_student') }}</h4>
                            <h5>{{ translate('from') }}: {{ $class_from->name }} To {{ $class_to->name }}</h5>
                            <h5>{{ translate('from_session') }}: {{ $session_from_info->name }} To {{ $session_to_info->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3 mb-lg-0">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped dt-responsive nowrap" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <th>{{ translate('student_name') }}</th>
                            <th>{{ translate('section') }}</th>
                            <th>{{ translate('code') }}</th>
                            <th>{{ translate('status') }}</th>
                            <th>{{ translate('action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student->user->name }}</td>
                                    <td>{{ $student->section->name }}</td>
                                    <td>{{ $student->student->code }}</td>
                                    <td style="text-align: center;">
                                        <span class="badge badge-info-lighten" id = "success_{{ $student->id }}" style="display: none;">Promoted</span>
                                        <span class="badge badge-light"  id = "danger_{{ $student->id }}">{{ translate('not_promoted_yet') }}</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-icon btn-success btn-sm" onclick="enrollStudent('{{ $student->id.'-'.$class_id_to.'-'.$session_to }}', {{ $student->id }})"> {{ translate('enroll_to') }} <strong> {{ $class_to->name }} </strong> </button>
                                        <button type="button" class="btn btn-icon btn-secondary btn-sm" onclick="enrollStudent('{{ $student->id.'-'.$class_id_from.'-'.$session_to }}')"> {{ translate('enroll_to') }} <strong> {{ $class_from->name }} </strong> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
