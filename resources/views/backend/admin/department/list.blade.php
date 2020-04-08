<table class="table table-hover table-centered mb-0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>

    @foreach (App\Department::where('school_id', school_id())->get() as $department)
        <tr>
            <td>{{ $department->name }}</td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('department.edit', $department->id) }}', 'Update Department')"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('department.destroy', $department->id) }}', 'department_content' )"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Department::where('school_id', school_id())->get()) == 0)
        <tr>
            <td colspan="2"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
