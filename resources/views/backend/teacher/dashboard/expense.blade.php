@php
    $date_from = date('Y-m-01')." 00:00:00"; // hard-coded '01' for first day
    $date_to   = date('Y-m-t')." 23:59:59";
    $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->where('date', '>=', strtotime($date_from))->where('date', '<=', strtotime($date_to))->get();
@endphp

    <div class="table-responsive-sm">
        <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
            <thead>
            <tr>
                <th width = "60%">{{ translate('expense') }}</th>
                <th width = "40%">{{ translate('amount') }}</th>
            </tr>
            </thead>
            <tbody>
                @if (count($expenses) > 0)
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ $expense->expense_category->name }}</td>
                            <td>{{ $expense->amount }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
<style>
    .table-responsive {
        display: inline-table;
    }
</style>


