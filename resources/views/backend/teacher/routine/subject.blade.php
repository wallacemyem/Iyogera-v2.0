<select class="form-control" name="subject_id" id="subject_id" required>
    @if (count($subjects) == 0)
        <option value="">{{ translate('no_subjects_found') }}</option>
    @else
        <option value="">{{ translate('select_a_subject') }}</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    @endif
</select>
