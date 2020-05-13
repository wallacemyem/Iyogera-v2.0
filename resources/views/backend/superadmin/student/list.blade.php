

@if (isset($students) && count($students) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                    <tr>
                        <th>{{ translate('code') }}</th>
                        <th>{{ translate('photo') }}</th>
                        <th>{{ translate('name') }}</th>
                        <th>{{ translate('option') }}</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                            <td>{{ $student->student->code }}</td>
                            <td>
                                <img src="{{ asset('backend/images/student_image/'.$student->profile_pix.'.jpg') }}" alt="{{$student->name}}" height="100" width="100">
                            </td>
                        <td>{{ $student->student->user->name }}</td>
                        <td>
                            <div class="btn-group mb-2">

                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showLargeAjaxModal('{{ route('student.profile', $student->student->id) }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('student_profile') }}"> <i class="dripicons-checklist"></i> </button>

                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_student') }}"> <i class="mdi mdi-wrench"></i> </a>

                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('student.destroy', $student->id) }}', classAndSectionWiseStudents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_student') }}"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
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




