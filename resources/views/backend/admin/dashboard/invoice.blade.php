@php
    $date_from = date('Y-m-01')." 00:00:00"; // hard-coded '01' for first day
    $date_to   = date('Y-m-t')." 23:59:59";
@endphp
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
        <tr>
            <th>{{ translate('student') }}</th>
            <th>{{ translate('class') }}</th>
            <th>{{ translate('invoice_title') }}</th>
            <th>{{ translate('total_amount') }}</th>
            <th>{{ translate('paid_amount') }}</th>
            <th>{{ translate('status') }}</th>
            {{--  <th>Creation Date</th>  --}}
        </tr>
        </thead>
        <tbody>
            @php
            $invoices = App\Invoice::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->where('created_at', '>=', $date_from)->where('created_at', '<=', $date_to)->get();
            @endphp
        @foreach ($invoices as $invoice)
            {{-- @if (strtotime($invoice->created_at) >= $date_from && strtotime($invoice->created_at) <= $date_to) --}}
                <tr>
                    <td>{{ $invoice->student->user->name }}</td>
                    <td>
                        {{ $invoice->class->name }}
                    </td>
                    <td>
                        {{ $invoice->title }}
                    </td>
                    <td>
                        {{ $invoice->total_amount }}
                    </td>
                    <td>
                        {{ $invoice->paid_amount }}
                    </td>
                    <td>
                        {{ ucfirst($invoice->status) }}
                    </td>
                    {{--  <td>
                        {{ date('D, d-M-Y', strtotime($invoice->created_at)) }}
                    </td>  --}}
                </tr>
            {{-- @endif --}}
        @endforeach
        @if (sizeof(App\Invoice::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get()) == 0)
            <tr>
                <td colspan="8"> No Data Found</td>
            </tr>
        @endif
        </tbody>
    </table>
