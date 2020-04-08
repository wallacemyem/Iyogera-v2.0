<form method="POST" class="d-block ajaxForm" action="{{ route('room.update', $room->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">{{ translate('class_room_name') }}</label>
                <input type="text" class="form-control" id="name" name = "name" value="{{ $room->name }}" required>
                <small id="name_help" class="form-text text-muted">{{ translate('provide_a_class_room_name') }}.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">{{ translate('update_class_room') }}</button>
            </div>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllClassRooms);
        });
    </script>
