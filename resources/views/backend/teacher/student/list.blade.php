

@if (isset($students) && count($students) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                    <tr>
                        
                        <th>{{ translate('photo') }}</th>
                        <th>{{ translate('name') }}</th>
                        <th>{{ translate('code') }}</th>
                        
                    </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                            
                            <td>
                                @if (file_exists('https://localhost/dev/backend/images/student_image/'.$student->profile_pix.'.jpg'))
                                    <img src="{{'https://localhost/dev/backend/images/student_image/'.$student->profile_pix.'.jpg'}}" alt="$student->name" height="50" width="50" class="rounded-circe">
                                @else
                                    <img src="{{ asset('backend/images/student_image/preview.png') }}" alt="" height="50">
                                @endif
                            </td>
                        <td>{{ $student->student->user->name }}</td>
                        <td>{{ $student->student->code }}</td>
                        
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




