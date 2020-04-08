<form method="POST" class="d-block ajaxForm" action="{{ route('teacher.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Teacher Name</label>
                <input type="text" class="form-control" id="name" name = "name" required>
                <small id="" class="form-text text-muted">Provide Teacher's Name.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name = "email" required>
                <small id="" class="form-text text-muted">Provide Teacher's Email.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name = "password" required>
                <small id="" class="form-text text-muted">Provide Teacher's Password.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name = "designation" required>
                <small id="" class="form-text text-muted">Provide Teacher's Phone Number.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="">Please select a Department</option>
                    @foreach (\App\Department::where('school_id', school_id())->get() as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <small id="" class="form-text text-muted">Provide Department Name.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name = "phone" required>
                <small id="" class="form-text text-muted">Provide Teacher's Phone Number.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                <small id="" class="form-text text-muted">Provide Teacher's Gender.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="blood_group">Blood Group</label>
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
                <small id="" class="form-text text-muted">Provide Teacher's Blood Group.</small>
            </div>

            {{-- <div class="form-group col-md-12">
                <label for="birthday">Birthday</label>
                <input type="text" class="form-control date" id="birthday" name = "birthday" data-toggle="date-picker" data-single-date-picker="true">
                <small id="" class="form-text text-muted">Provide Teacher's Birth date.</small>
            </div> --}}

            <div class="form-group col-md-12">
                <label for="phone">Address</label>
                <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
                <small id="" class="form-text text-muted">Provide Teacher's Address.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">Create Teacher</button>
            </div>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'teacher_content');
        });
    </script>
