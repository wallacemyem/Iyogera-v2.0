@php
    $departments = App\Department::where('school_id', school_id())->get();
@endphp
@if (count($departments) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>{{ translate('name') }}</th>
            <th>{{ translate('option') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary" style="margin-right:5px;" onclick="showAjaxModal('{{ route('department.edit', $department->id) }}', 'Update Department')"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark" style="margin-right:5px;" onclick="confirm_modal('{{ route('department.destroy', $department->id) }}', showAllDepartments )"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
    </div>
@endif


