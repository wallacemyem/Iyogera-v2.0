<form method="POST" class="d-block ajaxForm" action="{{ route('schools.update', $school->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">{{ translate('school_name') }}</label>
            <input type="text" class="form-control" id="name" name = "school_name" value="{{ $school->name }}" required>
            <small id="name_help" class="form-text text-muted">{{ translate('provide_school_name') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="address">{{ translate('address') }}</label>
            
                <textarea class="form-control" id="example-textarea" rows="5" name = "address"  >{{ $school->address }}</textarea>
            
            <small id="author_help" class="form-text text-muted">{{ translate('provide_school_address') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">{{ translate('phone_number') }}</label>
            <input type="number" class="form-control" id="phone" name = "phone" min="0" value="{{ $school->phone }}" required>
            <small id="copies_help" class="form-text text-muted">{{ translate('provide_number_of_the_school') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('update_school_info') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllSchools);
    });
</script>
