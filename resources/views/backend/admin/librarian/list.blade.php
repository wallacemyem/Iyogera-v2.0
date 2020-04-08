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
        $librarians = \App\User::where('school_id', school_id())->where('role', 'librarian')->get();
        @endphp
            @foreach ( $librarians as $librarian)
                <tr>
                    <td> {{ $librarian->name }} </td>
                    <td> {{ $librarian->email }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('librarian.edit', $librarian->id) }}', 'Update Librarian')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Librarian info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('librarian.destroy', $librarian->id) }}', 'librarian_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Librarian"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if (count($librarians) == 0)
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
                {{ $librarians->links() }}
        </div>
    </div>

