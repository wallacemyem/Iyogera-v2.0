<form method="POST" class="d-block ajaxForm" action="{{ route('session_manager.update', $session->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="session_title">{{ translate('session_title') }}</label>
            <input type="text" class="form-control" id="session_title" name = "session_title" value="{{ $session->name }}" required>
            <small id="session_title_help" class="form-text text-muted">{{ translate('provide_session_title') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('update_session') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllSessions);
    });
</script>

