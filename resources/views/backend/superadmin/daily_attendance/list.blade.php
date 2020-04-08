@if (isset($month) && isset($year))
    @php
        $number_of_days = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($month)), $year);
        $class_name = App\Classes::find($class_id)->pluck('name')->first();
        $section_name = App\Section::find($section_id)->pluck('name')->first();
    @endphp

    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h5>{{ translate('attendance_report') }}</h5>
                        <h6> {{ translate('class') }} : {{ $class_name }}</h6>
                        <h6> {{ translate('section') }} : {{ $section_name }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-sm " width="100%">
        <thead class="thead-dark">
            <tr style="font-size: 12px;">
                <th width = "40px">{{ translate('student') }} <i class="mdi mdi-arrow-down"></i> {{ translate('date') }} <i class="mdi mdi-arrow-right"></i></th>
                @for ($i = 1; $i <= $number_of_days; $i++)
                    <th>{{$i}}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @if (isset($students))
                @foreach ($students as $student)
                    <tr>
                        <td width = "124px;" style="font-size: 12px;">{{ $student->student->user->name }}</td>
                        @for ($i = 1; $i <= $number_of_days; $i++)
                            @php
                                $status = App\DailyAttendance::where('school_id', school_id())->where('class_id', $class_id)->where('section_id', $section_id)->where('student_id', $student->student_id)->where('timestamp', strtotime($i.'-'.$month.'-'.$year))->pluck('status')->first();
                            @endphp

                            @if ($status === 1)
                                <td><i class="fas fa-circle" style="color: green; font-size: 10px;"></i></td>
                            @elseif($status === 0)
                                <td><i class="fas fa-circle" style="color: red; font-size: 10px;"></i></td>
                            @else
                                <td>{{ $status }}</td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
                @if (count($students) == 0)
                    <tr>
                        <td colspan="{{ $number_of_days+1 }}">No data found</td>
                    </tr>
                @endif
            @else
            <tr>
                <td colspan="{{ $number_of_days+1 }}">No data found</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="row d-print-none mt-3 justify-content-md-center">
        <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> Print</a>
    </div>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif


