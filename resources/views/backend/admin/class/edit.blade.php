<form method="POST" class="d-block ajaxForm" action="{{ route('class.update', $classes->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Class name</label>
                <input type="text" class="form-control" id="name" name = "name" value="{{ $classes->name }}" required>
                <small id="name_help" class="form-text text-muted">Provide Class Name.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">Update Class</button>
            </div>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({ }); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'class_content');
        });
    </script>
