<form method="POST" class="d-block ajaxForm" action="{{ route('expense_category.store') }}">
    @csrf
    <div class="form-group col-md-12">
        <label for="name">{{ translate('expense_category_name') }}</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name" class="form-text text-muted">{{ translate('provide_expense_category_name') }}.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">{{ translate('save_expense_category') }}</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllExpenseCategories);
    });
</script>
