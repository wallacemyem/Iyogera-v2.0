<select class="form-control" name="student_id" id="student_id" required>
    @if (count($students) == 0)
        <option value="">{{ translate('no_student_found') }}</option>
    @else
        <option value="">{{ translate('select_a_student') }}</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}">{{ $student->student->user->name }}</option>
        @endforeach
    @endif
</select>
