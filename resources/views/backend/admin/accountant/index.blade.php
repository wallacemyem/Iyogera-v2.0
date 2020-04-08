@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Accountant</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('accountant.create') }}', 'Create Accountant')"> <i class="mdi mdi-plus"></i> Add New Accountant</button>
                    <h4 class="header-title mt-3">Accountant List</h4>
                    <div class="table-responsive-sm" id = "accountant_content">
                        @include('backend.'.Auth::user()->role.'.accountant.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
