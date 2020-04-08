<select class="form-control" name="section_id" id="section_id" onchange="onChangeSection(this.value)" required>
    @if (count($sections) == 0)
        <option value="">Select A Class First</option>
    @else
        <option value="">Select A Section</option>
        @foreach ($sections as $section)
            <option value="{{ $section->id }}">{{ $section->name }}</option>
        @endforeach
    @endif
</select>
