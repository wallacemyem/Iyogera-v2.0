<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Option</th>
        </tr>
    </thead>
        <tbody>
        @php
        if(isset($department_id) && $department_id > 0){
            $teachers = \App\Teacher::where('school_id', school_id())->where('department_id', $department_id)->get();
        }else {
            $teachers = \App\Teacher::where('school_id', school_id())->get();
        }

        @endphp
            @foreach ( $teachers as $teacher)
                <tr>
                    <td> {{ $teacher->user->name }} </td>
                    <td> {{ $teacher->department->name }} </td>
                    <td> {{ $teacher->designation }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.permission', $teacher->id) }}', 'Assigned Permissions')"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign permission for teachers"> <i class="dripicons-checklist"></i> </button>
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $teacher->id) }}', 'Update Teacher')"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Update teacher"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $teacher->id) }}', 'teacher_content' )"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Teacher"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if (count($teachers) == 0)
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $teachers->links() }}
        </div>
</div>
