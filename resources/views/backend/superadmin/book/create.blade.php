<form method="POST" class="d-block ajaxForm" action="{{ route('book.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">{{ translate('book_name') }}</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">{{ translate('provide_a_book_name') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="author">{{ translate('author') }}</label>
            <input type="text" class="form-control" id="author" name = "author" required>
            <small id="author_help" class="form-text text-muted">{{ translate('provide_author_name') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="copies">{{ translate('number_of_copy') }}</label>
            <input type="number" class="form-control" id="copies" name = "copies" min="0" required>
            <small id="copies_help" class="form-text text-muted">{{ translate('provide_total_number_of_books_copy') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('save_book_info') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllBooks);
    });
</script>
