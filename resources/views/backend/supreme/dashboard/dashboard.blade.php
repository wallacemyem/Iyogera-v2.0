@extends('backend.layout.main-s')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box ">
                <h4 class="page-title"> <i class="em em-heart_decoration" aria-role="presentation" aria-label="HEART DECORATION"></i> {{ translate('dashboard') }} </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ translate('overview') }}</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat" id="student" style="on">
                                        <div class="card-body ">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Students"> <i class="mdi mdi-account-group title_icon"></i>  {{ translate('students') }} <a href="#" style="color: #ffffff; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $students = \App\Enroll::get();
                                                    echo count($students);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">{{ translate('total_number_of_students') }}</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-lg-6">
                                    <div class="card widget-flat" id="teacher" style="on">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Schools"> <i class="mdi mdi-account-group title_icon"></i> {{ translate('schools') }}  <a href="{{ route('schools.index') }}" style="color: #ffffff; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $teachers = \App\School::get();
                                                    echo count($teachers);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">{{ translate('total_number_of_schools') }}</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                                <div class="col-lg-6">
                                    <div class="card widget-flat" id="teacher" style="on">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Schools"> <i class="mdi mdi-account-group title_icon"></i> {{ translate('users') }}  <a href="{{ route('schools.index') }}" style="color: #ffffff; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $teachers = \App\User::get();
                                                    echo count($teachers);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">{{ translate('total_number_of_users') }}</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
              
            </div>
        </div><!-- end col-->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ translate('accounts_of') }} {{ date('F') }}  <a href="{{ route('invoice.index') }}" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.".dashboard.invoice")
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            initDataTable("expense-datatable");
        });

        $(".widget-flat").mouseenter(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').show();
        }).mouseleave(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').hide();
        });
    </script>
@endsection
