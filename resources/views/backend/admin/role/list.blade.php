@php
    $roles  = Schema::getColumnListing('roles');
@endphp
<table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
        @php
            if ($role == 'id' || $role == 'school_id' || $role == 'created_at' || $role == 'updated_at')
                continue;
        @endphp
            <tr>
                <td>{{ ucfirst(str_replace('_', ' ', $role)) }}</td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('accessibility.edit', $role) }}', 'Update {{ ucfirst(str_replace('_', ' ', $role)) }} Role Accessibility')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update User Role Accessibility"> <i class="mdi mdi-file-tree"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
