<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Addon::where('school_id', school_id())->get() as $addon)
        <tr>
            <td>{{ ucfirst(str_replace('_', ' ', $addon->name)) }}</td>
            <td>
                @if ($addon->status == 1)
                <i class="mdi mdi-circle text-success"></i> Enabled
                @else
                    <i class="mdi mdi-circle text-disable"></i> Disabled
                @endif
            </td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('addon_manager.destroy', $addon->id) }}', 'addon_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disable addon"> <i class="mdi mdi-link-variant-off"></i> </button>

                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('addon_manager.destroy', $addon->id) }}', 'addon_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete addon"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Addon::where('school_id', school_id())->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
