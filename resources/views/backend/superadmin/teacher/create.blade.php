<form method="POST" class="d-block ajaxForm" action="{{ route('teacher.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">{{ translate('teacher_name') }}</label>
                <input type="text" class="form-control" id="name" name = "name" required>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="email">{{ translate('email') }}</label>
                <input type="email" class="form-control" id="email" name = "email" required>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_email') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="password">{{ translate('password') }}</label>
                <input type="password" class="form-control" id="password" name = "password" required>
                <small id="" class="form-text text-muted">{{ translate('provide_teacher_password') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="designation">{{ translate('designation') }}</label>
                <input type="text" class="form-control" id="designation" name = "designation" required>
                <small id="" class="form-text text-muted">{{ translate('provide_teacher_designation') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="department">{{ translate('department') }}</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="">{{ translate('please_select_a_department') }}</option>
                    @foreach (\App\Department::where('school_id', school_id())->get() as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <small id="" class="form-text text-muted">{{ translate('provide_department_name') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="phone">{{ translate('phone_number') }}</label>
                <input type="text" class="form-control" id="phone" name = "phone" required>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_phone_number') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="gender">{{ translate('gender') }}</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">{{ translate('male') }}</option>
                    <option value="female">{{ translate('female') }}</option>
                    <option value="others">{{ translate('others') }}</option>
                </select>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_gender') }}.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="blood_group">{{ translate('blood_group') }}</label>
                <select name="blood_group" id="blood_group" class="form-control">
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_blood_group') }}.</small>
            </div>

            {{-- <div class="form-group col-md-12">
                <label for="birthday">Birthday</label>
                <input type="text" class="form-control date" id="birthday" name = "birthday" data-toggle="date-picker" data-single-date-picker="true">
                <small id="" class="form-text text-muted">Provide Teacher's Birth date.</small>
            </div> --}}

            <div class="form-group col-md-12">
                <label for="phone">{{ translate('address') }}</label>
                <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
                <small id="" class="form-text text-muted">{{ translate('provide_teachers_address') }}.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">{{ translate('create_teacher') }}</button>
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

