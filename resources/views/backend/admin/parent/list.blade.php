<table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Option</th>
            </tr>
        </thead>
            <tbody>
            @php
            $parents = \App\User::where('school_id', school_id())->where('role', 'parent')->get();
            @endphp
                @foreach ( $parents as $parent)
                    <tr>
                        <td> {{ $parent->id }} </td>
                        <td> {{ $parent->name }} </td>
                        <td> {{ $parent->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.show', $parent->id) }}', '')" data-toggle="tooltip" data-placement="top" title="" data-original-title=""> <i class="dripicons-checklist"></i> </button>
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.edit', $parent->id) }}', 'Update Parent')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Parent info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm"      style="margin-right:5px;" onclick="confirm_modal('{{ route('parent.destroy', $parent->id) }}', 'parent_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Parent"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if (count($parents) == 0)
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
                    {{ $parents->links() }}
            </div>
        </div>

