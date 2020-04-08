@php
    $parents = \App\User::where('school_id', school_id())->where('role', 'parent')->get();
@endphp

@if (count($parents) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>{{ translate('parent_id') }}</th>
                    <th>{{ translate('name') }}</th>
                    <th>{{ translate('email') }}</th>
                    <th>{{ translate('option') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $parents as $parent)
                    <tr>
                        <td> {{ $parent->id }} </td>
                        <td> {{ $parent->name }} </td>
                        <td> {{ $parent->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                {{-- <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.show', $parent->id) }}', '')" data-toggle="tooltip" data-placement="top" title="" data-original-title=""> <i class="dripicons-checklist"></i> </button> --}}
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.edit', $parent->id) }}', '{{ translate('update_parent') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_parent_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm"      style="margin-right:5px;" onclick="confirm_modal('{{ route('parent.destroy', $parent->id) }}', showAllParents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_parent') }}"> <i class="mdi mdi-window-close"></i> </button>
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

