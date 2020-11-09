@php
    if(isset($school_id) && $school_id > 0){
        $teachers = \App\User::get();
    }else {
        $teachers = \App\User::get();
    }
@endphp
@if (count($teachers) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>{{ translate('name') }}</th>
                <th>{{ translate('email') }}</th>
                <th>{{ translate('role') }}</th>
                <th>{{ translate('school') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $teachers as $teacher)
                <tr>

                    <td> {{ $teacher->other_name }} {{ $teacher->first_name }} {{ $teacher->middle_name }} </td>
                    <td> {{ $teacher->email }} </td>
                    <td> {{ $teacher->role }} </td>
                    <td>
                       {{ $teacher->school->name }} 
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
