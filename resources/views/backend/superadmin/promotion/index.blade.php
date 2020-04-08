@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-switch title_icon"></i> {{ translate('student_promotion') }}
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
                            <label for="session_from">{{ __('current_session') }}</label>
                            <select class="form-control" id = "session_from" name="session_from">
                                @foreach (App\Session::where('school_id', school_id())->get() as $session)
                                    <option value="{{ $session->id }}" @if($session->id == get_settings('running_session')) selected @endif>{{ $session->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <label for="session_to">{{ __('next_session') }}</label>
                            <select class="form-control" id = "session_to" name="session_to">
                                @foreach (App\Session::where('school_id', school_id())->get() as $session)
                                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <label for="class_id_from">{{ __('promoting_from') }}</label>
                            <select name="class_id_from" id="class_id_from" class="form-control" required>
                                <option value="">Class</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <label for="class_id_to">{{ __('promoting_to') }}</label>
                            <select name="class_id_to" id="class_id_to" class="form-control" required>
                                <option value="">Class</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <label for="manage_student" style="color: white;">Manage Button</label>
                            <button type="button" class="btn btn-icon btn-secondary form-control" id = "manage_student" onclick="manageStudent()">{{ translate('manage_promotion') }}</button>
                        </div>
                    </div>

                    <div class="table-responsive-sm" id = "student_to_promote_content">
                        @include('backend.'.Auth::user()->role.'.mark.list')
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function manageStudent() {
            var session_from   = $('#session_from').val();
            var session_to     = $('#session_to').val();
            var class_id_from  = $('#class_id_from').val();
            var class_id_to    = $('#class_id_to').val();
            if(session_from > 0 && session_to > 0 && class_id_from > 0 && class_id_to > 0 ) {
                var url = '{{ route("student.promotion.student") }}';
                $.ajax({
                    type : 'POST',
                    url: url,
                    data : { session_from : session_from, session_to : session_to, class_id_from : class_id_from, class_id_to : class_id_to, _token : '{{ @csrf_token() }}' },
                    success : function(response) {
                        $('#student_to_promote_content').html(response);
                    }
                });
            }else {
                toastr.error('{{ translate('please_make_sure_to_fill_all_the_necessary_fields') }}');
            }
        }

        function enrollStudent(promotion_data, enroll_id) {
            var url = '{{ route("student.promote", "promotion_data") }}';
            url = url.replace('promotion_data', promotion_data);
                $.ajax({
                    type : 'get',
                    url: url,
                    success : function(response) {
                        $("#success_"+enroll_id).show();
                        $("#danger_"+enroll_id).hide();
                        toastr.success('{{ translate('student_has_been_promoted_successfully') }}');
                    }
                });
        }
    </script>
@endsection
