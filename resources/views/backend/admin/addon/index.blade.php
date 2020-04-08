@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-power-plug title_icon"></i> Manage Addons</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('addon_manager.create') }}', 'Add New Addon')"> <i class="mdi mdi-plus"></i> Add New Addon</button>
                    <h4 class="header-title mt-3">Installed Addons</h4>
                    <div class="table-responsive-sm" id = "addon_content">
                        @include('backend.'.Auth::user()->role.'.addon.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
