@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-content-paste title_icon"></i> {{ translate('department') }}
                <button type="button" class="btn btn-icon btn-success mb-1 btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('department.create') }}', '{{ translate('create_department') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_new_department') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "department_content">
                        @include('backend.'.Auth::user()->role.'.department.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllDepartments = function () {
        var url = '{{ route("department.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#department_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
