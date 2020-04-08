<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Session::where('school_id', school_id())->get() as $session)
        <tr>
            <td>{{ $session->name }}</td>
            <td>
                @if ($session->status == 0)
                    <i class="mdi mdi-circle text-disable"></i> Disabled
                @else
                    <i class="mdi mdi-circle text-success"></i> Enabled
                @endif
            </td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('session_manager.edit', $session->id) }}', 'Update Session')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Session info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('session_manager.destroy', $session->id) }}', 'session_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Session"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Session::where('school_id', school_id())->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
