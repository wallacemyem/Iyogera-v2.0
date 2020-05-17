

@if (isset($students) && count($students) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                    <tr>
                        <th>{{ translate('photo') }}</th>
                        <th>{{ translate('code') }}</th>
                        <th>{{ translate('name') }}</th>
                        
                    </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>

                            <img src="{{ asset('backend/images/student_image/'.$student->student->profile_pix.'.jpg') }}" alt="{{$student->name}}" height="50" width="50">
            
                        </td>
                        <td>{{ $student->student->code }}</td>
                            
                        <td>{{ $student->student->user->name }}</td>
                        
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




