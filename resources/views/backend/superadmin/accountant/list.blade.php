@php
    $accountants = \App\User::where('school_id', school_id())->where('role', 'accountant')->get();
@endphp
@if (count($accountants) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>{{ translate('name') }}</th>
                    <th>{{ translate('email') }}</th>
                    <th>{{ translate('option') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $accountants as $accountant)
                    <tr>
                        <td> {{ $accountant->name }} </td>
                        <td> {{ $accountant->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('accountant.edit', $accountant->id) }}', '{{ translate('update_accountant') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_accountant_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('accountant.destroy', $accountant->id) }}', showAllAccountants )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_accountant') }}"> <i class="mdi mdi-window-close"></i> </button>
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



