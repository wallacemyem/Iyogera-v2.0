@php
    $schools = DB::table('schools')->get();
    
@endphp
@if (sizeof($schools) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('school_name') }}</th>
                <th>{{ translate('address') }}</th>
                <th>{{ translate('phone_number') }}</th>
                <th>{{ translate('number_of_students') }}</th>
                <th>{{ translate('amount_to_pay') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                    <tr>
                        <td>{{ $school->name }}</td>
                        <td>
                            {{ $school->address }}
                        </td>
                        <td>
                            {{ $school->phone }}
                        </td>
                        <td>
                            @php
                                $students = \App\Enroll::where(['school_id' => $school->id])->get();
                                echo count($students);
                            @endphp
                        </td>
                        <td>
                           @php
                                $students = \App\Enroll::where(['school_id' => $school->id])->get();
                                $stc = count($students);
                                $amount_p = $stc * 250;
                                echo $amount_p;
                            @endphp 
                        </td>
                        
                        <td>

                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('schools.edit', $school->id) }}', '{{ translate('update_school') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update School info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('schools.destroy', $school->id) }}', showAllSchools )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_school') }}"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
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
