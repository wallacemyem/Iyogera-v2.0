@php
    $grades = App\Grade::where(['school_id' => school_id(), 'session' => get_schools()])->get();
@endphp
@if (count($grades) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('grade_name') }}</th>
                <th>{{ translate('grade_point') }}</th>
                <th>{{ translate('mark_from') }}</th>
                <th>{{ translate('mark_upto') }}</th>
                <th>{{ translate('comment') }}</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->grade_point }}</td>
                    <td>{{ $grade->mark_from }}</td>
                    <td>{{ $grade->mark_upto }}</td>
                    <td>{{ $grade->comment }}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align: center;">
            <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
            <p>{{ translate('no_data_found') }}</p>
    </div>
@endif


