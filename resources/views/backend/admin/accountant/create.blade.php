<form method="POST" class="d-block ajaxForm" action="{{ route('accountant.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Accountant Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="" class="form-text text-muted">Provide Name.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name = "email" required>
            <small id="" class="form-text text-muted">Provide Email.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name = "password" required>
            <small id="" class="form-text text-muted">Provide Password.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="" class="form-text text-muted">Provide Phone Number.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">Select a gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <small id="" class="form-text text-muted">Provide Gender.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="blood_group">Blood Group</label>
            <select name="blood_group" id="blood_group" class="form-control" required>
                <option value="">Select a blood group</option>
                <option value="a+">A+</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
                <option value="b-">B-</option>
                <option value="ab+">AB+</option>
                <option value="ab-">AB-</option>
                <option value="o+">O+</option>
                <option value="o-">O-</option>
            </select>
            <small id="" class="form-text text-muted">Provide Blood Group.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">Address</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted">Provide Address.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Accountant</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'accountant_content');
    });
</script>
