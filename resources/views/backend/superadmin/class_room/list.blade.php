@php
    $rooms = App\ClassRoom::where('school_id', school_id())->get();
@endphp
@if(count($rooms) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
            <tr>
                <th>{{ translate('name') }}</th>
                <th>{{ translate('option') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('room.edit', $room->id) }}', '{{ translate('update_class_room') }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('update_class_rooms_info') }}"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('room.destroy', $room->id) }}', showAllClassRooms )" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ translate('delete_class_room') }}"> <i class="mdi mdi-window-close"></i> </button>
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
