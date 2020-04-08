@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> {{ translate('expense') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('expense.create') }}', '{{ translate('create_new_expense') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_expense') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <div class="form-group">
                                <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                                    <i class="mdi mdi-calendar"></i>&nbsp;
                                    <span id="selectedValue"> {{ date('F d, Y', strtotime(' -30 day')).' - '.date('F d, Y') }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="expense_category_id" id="expense_category_id">
                                <option value="all">{{ translate('expense_category') }}</option>
                                @foreach (App\ExpenseCategory::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get() as $expense_category)
                                    <option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="showAllExpenses()">{{ translate('filter') }}</button>
                        </div>
                    </div>
                    <div id = "expense_content">
                        @include('backend.'.Auth::user()->role.'.expense.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        var showAllExpenses = function () {
            var url = '{{ route("expense.list") }}';
            $.ajax({
                type : 'GET',
                url: url,
                data : {date : $('#selectedValue').text(), expense_category_id : $('#expense_category_id').val()},
                success : function(response) {
                    $('#expense_content').html(response);
                    initDataTable("basic-datatable");
                }
            });
        }
    </script>
@endsection
