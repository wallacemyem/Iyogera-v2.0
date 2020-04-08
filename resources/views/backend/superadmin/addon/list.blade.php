@if (sizeof(App\Addon::get()) > 0)
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
    <tr>
        <th>{{ translate('name') }}</th>
        <th>{{ translate('status') }}</th>
        <th>{{ translate('option') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Addon::get() as $addon)
        <tr>
            <td>{{ ucfirst(str_replace('_', ' ', $addon->name)) }}</td>
            <td>
                @if ($addon->status == 1)
                <i class="mdi mdi-circle text-success"></i> {{ translate('enabled') }}
                @else
                    <i class="mdi mdi-circle text-disable"></i> {{ translate('disabled') }}
                @endif
            </td>
            <td>
                <div class="btn-group mb-2">
                    @if ($addon->status == 1)
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('addon_manager.destroy', $addon->id) }}', showAllAddons )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('disable_addon') }}"> <i class="mdi mdi-link-variant-off"></i> </button>
                        <a href="{{ route($addon->unique_identifier.'.index') }}"  class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('go_to_addon') }}"> <i class="mdi mdi-arrow-top-right"></i> </a>
                    @else
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('addon_manager.destroy', $addon->id) }}', showAllAddons )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('enable_addon') }}"> <i class="mdi mdi-link-variant-off"></i> </button>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
    </div>
@endif
