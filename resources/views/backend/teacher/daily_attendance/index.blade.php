@php
    $month_array = array(
        'January'   => 'Jan',
        'February'  => 'Feb',
        'March'     => 'Mar',
        'April'     => 'Apr',
        'May'       => 'May',
        'June'      => 'Jun',
        'July'      => 'Jul',
        'August'    => 'Aug',
        'September' => 'Sep',
        'October'   => 'Oct',
        'November'  => 'Nov',
        'December'  => 'Dec'
    );
@endphp
@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-search title_icon"></i> {{ translate('daily_attendance') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('daily_attendance.create') }}', '{{ translate('take_attendance') }}')"> <i class="mdi mdi-plus"></i> {{ translate('take_attendance') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-md-center d-print-none" style="margin-bottom: 10px;">
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select name="month" id="month" class="form-control">
                                <option value="">{{ translate('select_month') }}</option>
                                @foreach ($month_array as $key=>$value)
                                <option value="{{ $value }}" @if (date('M') == $value) selected @endif>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select name="year" id="year" class="form-control">
                                <option value="">{{ translate('select_year') }}</option>
                                @for ($i = 2016; $i <= 2118; $i++)
                                    <option value="{{ $i }}" @if(date('Y') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="class_id" id="class_id" onchange="classWiseSection(this.value)">
                                <option value="all">{{ translate('select_a_class') }}</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0" id = "section_content">
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="all">{{ translate('select_a_section') }}</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="getDailtyAttendance()">{{ translate('filter') }}</button>
                        </div>
                    </div>

                    <div class="table-responsive-sm" id = "daily_attendance_content">
                        @include('backend.'.Auth::user()->role.'.daily_attendance.list')
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content').html(response);
                }
            });
        }
        function onChangeSection(section_id) {

        }

        var getDailtyAttendance = function () {
            var section_id = $("#section_id").val();
            if(section_id > 0) {
                var url = '{{ route("daily_attendance.show_attendance") }}';
                var month = $('#month').val();
                var year = $('#year').val();

                $.ajax({
                    type : 'POST',
                    url: url,
                    data : { section_id : section_id, month : month, year : year, _token : '{{ @csrf_token() }}' },
                    success : function(response) {
                        $('#daily_attendance_content').html(response);
                    }
                });
            }
        }
    </script>
@endsection
