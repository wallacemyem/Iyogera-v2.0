@php
    if(isset($department_id) && $department_id > 0){
        $teachers = \App\Teacher::where('school_id', school_id())->where('department_id', $department_id)->get();
    }else {
        $teachers = \App\Teacher::where('school_id', school_id())->get();
    }
@endphp
@if (count($teachers) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>{{ translate('name') }}</th>
                <th>{{ translate('department') }}</th>
                <th>{{ translate('designation') }}</th>
                <th>{{ translate('phone_number') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $teachers as $teacher)
                <tr>
                    <td> {{ $teacher->user->name }} </td>
                    <td> {{ $teacher->department->name }} </td>
                    <td> {{ $teacher->designation }} </td>
                    <td>
                        {{ $teacher->user->phone}}
                    </td>
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
