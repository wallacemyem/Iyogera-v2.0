<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
            <tr>
                <th>Code</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
            <tbody>
                @if (isset($students))
                    @foreach ($students as $student)
                        <tr>
                                <td>{{ $student->student->code }}</td>
                            <td></td>
                            <td>{{ $student->student->user->name }}</td>
                            <td>
                                <div class="btn-group mb-2">

                                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showLargeAjaxModal('{{ route('student.profile', $student->student->id) }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student Profile"> <i class="dripicons-checklist"></i> </button>

                                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $student->id) }}', 'Update Teacher')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Student"> <i class="mdi mdi-wrench"></i> </button>

                                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $student->id) }}', 'teacher_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Student"> <i class="mdi mdi-window-close"></i> </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($students) == 0)
                        <tr>
                            <td colspan="4">No data found</td>
                        </tr>
                    @endif
                @else
                <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endif
            </tbody>
        </table>


