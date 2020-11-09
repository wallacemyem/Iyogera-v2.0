<form method="POST" class="d-block ajaxForm" action="{{ route('teacher.update', $teacher->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
        <div class="form-group col-md-12">
                <label for="name">{{ translate('teacher_first_name') }}</label>
                <input type="text" class="form-control" id="first_name" name = "first_name" required value="{{ $teacher->user->first_name }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_first_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="name">{{ translate('teacher_last_name') }}</label>
                <input type="text" class="form-control" id="other_name" name = "other_name" required value="{{ $teacher->user->other_name }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_last_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="name">{{ translate('teacher_other_name') }}</label>
                <input type="text" class="form-control" id="middle_name" name = "middle_name" value="{{ $teacher->user->middle_name }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_other_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                    <label for="email">{{ translate('email') }}</label>
                <input type="email" class="form-control" id="email" name = "email" required value="{{ $teacher->user->email }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_email') }}.</small>
            </div>

            <div class="form-group col-md-12">
                    <label for="designation">{{ translate('designation') }}</label>
                <input type="text" class="form-control" id="designation" name = "designation" required value="{{ $teacher->designation }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teacher_designation') }}.</small>
            </div>

            <div class="form-group col-md-12">
                    <label for="department">{{ translate('department') }}</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="">Please select a Department</option>
                    @foreach (\App\Department::where('school_id', school_id())->get() as $department)
                        <option value="{{ $department->id }}" @php if($department->id == $teacher->department_id) echo 'selected'; @endphp>{{ $department->name }}</option>
                    @endforeach
                </select>
                <small id="" class="form-text text-muted">{{ translate('provide_department_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                    <label for="phone">{{ translate('phone_number') }}</label>
                <input type="text" class="form-control" id="phone" name = "phone" required value="{{ $teacher->user->phone }}">
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_phone_number') }}.</small>
            </div>

            <div class="form-group col-md-12">
                    <label for="gender">{{ translate('gender') }}</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="male" @php if($teacher->user->gender == 'male') echo 'selected'; @endphp>{{ translate('male') }}</option>
                        <option value="female" @php if($teacher->user->gender == 'female') echo 'selected'; @endphp>{{ translate('female') }}</option>
                        <option value="others" @php if($teacher->user->gender == 'others') echo 'selected'; @endphp>{{ translate('others') }}</option>
                    </select>
                    <small id="" class="form-text text-muted">{{ translate('provide_teachers_gender') }}.</small>
                </div>

                <div class="form-group col-md-12">
                        <label for="blood_group">{{ translate('blood_group') }}</label>
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option value="a+" @php if($teacher->user->blood_group == 'a+') echo 'selected'; @endphp>A+</option>
                        <option value="a-" @php if($teacher->user->blood_group == 'a-') echo 'selected'; @endphp>A-</option>
                        <option value="b+" @php if($teacher->user->blood_group == 'b+') echo 'selected'; @endphp>B+</option>
                        <option value="b-" @php if($teacher->user->blood_group == 'b-') echo 'selected'; @endphp>B-</option>
                        <option value="ab+" @php if($teacher->user->blood_group == 'ab+') echo 'selected'; @endphp>AB+</option>
                        <option value="ab-" @php if($teacher->user->blood_group == 'ab-') echo 'selected'; @endphp>AB-</option>
                        <option value="o+" @php if($teacher->user->blood_group == 'o+') echo 'selected'; @endphp>O+</option>
                        <option value="o-" @php if($teacher->user->blood_group == 'o-') echo 'selected'; @endphp>O-</option>
                    </select>
                    <small id="" class="form-text text-muted">{{ translate('provide_teachers_blood_group') }}.</small>
                </div>

            {{-- <div class="form-group col-md-12">
                <label for="birthday">Birthday</label>
                <input type="text" class="form-control date" id="birthday" name = "birthday" data-toggle="date-picker" data-single-date-picker="true">
                <small id="" class="form-text text-muted">Provide Birth date.</small>
            </div> --}}

            <div class="form-group col-md-12">
                    <label for="phone">{{ translate('address') }}</label>
                <textarea class="form-control" id="address" name = "address" rows="5" required> {{ $teacher->user->address }}</textarea>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_address') }}.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">{{ translate('update_teacher') }}</button>
            </div>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, departmentWiseFilter);
        });
    </script>
