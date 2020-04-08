@php
    if(isset($expense_category_id)) {
        if($expense_category_id != "all"){
            $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('expense_category_id', $expense_category_id)->get();
        }else {
            $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->where('date', '>=', $date_from)->where('date', '<=', $date_to)->get();
        }
    }else {
        $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->where('date', '>=', $date_from)->where('date', '<=', $date_to)->get();
    }
@endphp
@if (count($expenses) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('date') }}</th>
                <th>{{ translate('amount') }}</th>
                <th>{{ translate('expense_category') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>
                        {{ date('D, d-M-Y', $expense->date) }}
                    </td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->expense_category->name }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('expense.edit', $expense->id) }}', '{{ translate('update_expense') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_expense_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('expense.destroy', $expense->id) }}', showAllExpenses )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_expense') }}"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif


