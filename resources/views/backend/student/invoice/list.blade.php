<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
    <tr>
        <th>{{ translate('student') }}</th>
        <th>{{ translate('class') }}</th>
        <th>{{ translate('invoice_title') }}</th>
        <th>{{ translate('total_amount') }}</th>
        <th>{{ translate('paid_amount') }}</th>
        <th>{{ translate('status') }}</th>
        <th>{{ translate('creation_date') }}</th>
        
    </tr>
    </thead>
    <tbody>
        @php
            $id = Auth::user()->id;
            $student = App\Student::where(['user_id' => $id])->get();
            foreach ( $student as $key ) {
            # code...
            }
            $student_id = $key->id;
            $invoices = App\Invoice::where(['student_id'=> $student_id, 'school_id'=> school_id(), 'session' => get_schools()])->where('created_at', '>=', date('Y-m-d h:i:s', $date_from))->where('created_at', '<=', date('Y-m-d h:i:s', $date_to))->get();
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
                <td>
                    {{ date('D, d-M-Y', strtotime($invoice->created_at)) }}
                </td>
                
            </tr>
        {{-- @endif --}}
    @endforeach
    @if (sizeof(App\Invoice::where(['school_id'=> school_id(), 'session' => get_schools()])->get()) == 0)
        <tr>
            <td colspan="8"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
