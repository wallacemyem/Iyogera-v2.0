@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> {{ translate('parent') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded mb-1 alignToTitle" onclick="showAjaxModal('{{ route('parent.create') }}', '{{ translate('create_parent') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_new_parent') }}</button>
            </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "parent_content">
                        @include('backend.'.Auth::user()->role.'.parent.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllParents = function () {
        var url = '{{ route("parent.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#parent_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
