<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Section</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
        <tr>
            <td>{{ $class->name }}</td>
            <td>
                <ul>
                    @foreach ($class->sections as $section)
                    <li>{{ $section->name }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.show', $class->id) }}', 'Sections')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Sections"> <i class="dripicons-checklist"></i> </button>
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.edit', $class->id) }}', 'Update Class')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Class info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('class.destroy', $class->id) }}', 'class_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Class"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Classes::where('school_id', school_id())->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
