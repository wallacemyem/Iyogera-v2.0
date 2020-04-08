@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> {{ translate('expense_category') }}
                    <button type="button" class="btn btn-icon btn-success mb-1 btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('expense_category.create') }}', '{{ translate('create_new_exam') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_expense_category') }}</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "expense_category_content">
                        @include('backend.'.Auth::user()->role.'.expense_category.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllExpenseCategories = function () {
        var url = '{{ route("expense_category.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#expense_category_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
