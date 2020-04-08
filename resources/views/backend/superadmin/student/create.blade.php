@extends('backend.layout.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><i class="mdi mdi-account-multiple-plus title_icon"></i> {{ translate('student_admission_form') }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                        <li class="nav-item" data-target-form="#accountForm">
                            <a href="{{ route('student.create') }}" class="nav-link rounded-0 pt-2 pb-2 @php if($type == 'single') echo 'active show'; @endphp">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span class="d-none d-sm-inline">{{ translate('single_student_admission') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#profileForm">
                            <a href="{{ route('student.bulk') }}" class="nav-link rounded-0 pt-2 pb-2 @php if($type == 'bulk') echo 'active show'; @endphp">
                                <i class="mdi mdi-account-group mr-1"></i>
                                <span class="d-none d-sm-inline">{{ translate('bulk_student_admission') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#otherForm">
                            <a href="{{ route('student.excel') }}" class="nav-link rounded-0 pt-2 pb-2 @php if($type == 'excel') echo 'active show'; @endphp">
                                <i class="mdi mdi-upload mr-1"></i>
                                <span class="d-none d-sm-inline">{{ translate('excel_upload') }}</span>
                            </a>
                        </li>
                    </ul>

                    @include('backend.'.Auth::user()->role.'.student.'.$type)
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    {{-- <div class="notification is-danger">
        @php
            foreach ($errors->all() as $error){
                flash($error)->error();
            }
        @endphp
    </div> --}}
@endsection
