<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
    </thead>
        <tbody>
        @php
        $accountants = \App\User::where('school_id', school_id())->where('role', 'accountant')->get();
        @endphp
            @foreach ( $accountants as $accountant)
                <tr>
                    <td> {{ $accountant->name }} </td>
                    <td> {{ $accountant->email }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('accountant.edit', $accountant->id) }}', 'Update Accountant')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Accountant info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('accountant.destroy', $accountant->id) }}', 'accountant_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Accountant"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if (count($accountants) == 0)
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- <div class="row justify-content-md-center"> --}}
    <div class="row">
        {{-- <div class="col-auto"> --}}
        <div class="col">
                {{ $accountants->links() }}
        </div>
    </div>

