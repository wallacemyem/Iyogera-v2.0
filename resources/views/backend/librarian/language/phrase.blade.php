@foreach (openJSONFile('en') as $key => $value)
    <div class="form-row align-items-end">
        <div class="form-group col-10">
            <label for="name">{{ $key }}</label>
            <input type="text" class="form-control" id="key_{{ $key }}" name = "key" @isset(openJSONFile($language->code)[$key]) value="{{ openJSONFile($language->code)[$key] }}" @endisset required>
            <input type="hidden" name="id" id = "language_id_{{ $key }}" value="{{ $language->id }}">
        </div>
        <div class="form-group col-2">
            <button class="btn btn-icon btn-success" type="button" onclick="updatePhrase('{{ $key }}')"><i class="mdi mdi-check-circle-outline"></i></button>
        </div>
    </div>
@endforeach
    