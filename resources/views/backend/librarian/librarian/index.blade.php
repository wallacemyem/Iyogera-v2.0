@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="mdi mdi-account-circle title_icon"></i> {{ translate('librarian') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('librarian.create') }}', '{{ translate('create_librarian') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_new_librarian') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "librarian_content">
                        @include('backend.'.Auth::user()->role.'.librarian.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllLibrarians = function () {
        var url = '{{ route("librarian.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#librarian_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
