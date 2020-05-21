@php
    $session = get_schools();
    $pym = App\Pin::where(['school_id' => school_id(), 'session' => $session])->get();
@endphp
@if (sizeof($pym) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('pin_number') }}</th>
                <th>{{ translate('number_of_use') }}</th>
                <th>{{ translate('date_created') }}</th>
                
            </tr>
            </thead>
            <tbody>
                @foreach ($pym as $pin)
                    <tr>
                        <td>{{ $pin->number }}</td>
                        <td>
                            {{ $pin->used }}
                        </td>
                        <td>
                            {{ $pin->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif
