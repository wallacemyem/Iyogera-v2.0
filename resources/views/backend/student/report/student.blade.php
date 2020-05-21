@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-format-list-numbers title_icon"></i> {{ translate('Result Sheet') }}
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center d-print-none" style="margin-bottom: 10px;">
                    <span class="text-warning font-weight-bold"><small>Confirm that results are available before contacting support</small></span>
                </div>
                    <div class="row justify-content-md-center d-print-none" style="margin-bottom: 10px;">
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="exam_id" id="exam_id">
                                <option value="all">{{ translate('select_a_exam') }}</option>
                                @foreach (App\Exam::where('school_id', school_id())->where('session', get_schools())->get() as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="session_id" id="session_id">
                                <option value="all">{{ translate('select_session') }}</option>
                                @foreach (App\Session::where('school_id', school_id())->get() as $session)
                                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($sexy === true)
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-primary form-control" onclick="manageMarks()">{{ translate('filter') }}</button>
                            </div>
                            
                        @else
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-primary form-control" onclick="manageMarks()">{{ translate('filter') }}</button>
                            </div>
                            
                        @endif

                        
                    </div>

                    <div class="table-responsive-sm" id = "marks_content">
                        @include('backend.'.Auth::user()->role.'.report.list')
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
                    classWiseSubject(class_id);
                }
            });
        }

        function classWiseSubject(class_id) {
            var url = '{{ route("routine.subject", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#subject_content').html(response);
                }
            });
        }
        function onChangeSection(section_id) {

        }

        var manageMarks = function () {
            var session_id = $("#session_id").val();
            var exam_id    = $("#exam_id").val();
            
            if(session_id > 0 && exam_id > 0) {
                var url = '{{ route("report.print") }}';
                var month = $('#month').val();
                var year = $('#year').val();

                $.ajax({
                    type : 'POST',
                    url: url,
                    data : { session_id : session_id, exam_id : exam_id, _token : '{{ @csrf_token() }}' },
                    success : function(response) {
                        $('#marks_content').html(response);
                    }
                });
            }else {
                new Toast({
                        message: 'Select all fields and Try again',
                        type: 'danger'
                        });
            }
        }

        var manageGenerate = function () {
            var section_id = $("#section_id").val();
            var exam_id    = $("#exam_id").val();
            
            if(section_id > 0 && exam_id > 0) {
                var url = '{{ route("report.generate") }}';
                var month = $('#month').val();
                var year = $('#year').val();

                $.ajax({
                    type : 'POST',
                    url: url,
                    data : { section_id : section_id, exam_id : exam_id, _token : '{{ @csrf_token() }}' },
                    success : function(response) {
                        new Toast({
                        message: 'Exams generated, DO NOT generate again',
                        type: 'success'
                        });
                    }
                });
            }else {
                new Toast({
                        message: 'Select all fields and Try again',
                        type: 'danger'
                        });
            }
        }

        

    </script>
@endsection
