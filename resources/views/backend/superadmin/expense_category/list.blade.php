@php
    $expense_categories = App\ExpenseCategory::where('school_id', school_id())->where('session', get_settings('running_session'))->get();
@endphp
@if (count($expense_categories) > 0)

<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('name') }}</th>
            <th>{{ translate('option') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($expense_categories as $expense_category)
            <tr>
                <td>{{ $expense_category->name }}</td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('expense_category.edit', $expense_category->id) }}', '{{ translate('update_expense_category') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_expense_category') }}"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('expense_category.destroy', $expense_category->id) }}', showAllExpenseCategories )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_expense_category') }}"> <i class="mdi mdi-window-close"></i> </button>
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

