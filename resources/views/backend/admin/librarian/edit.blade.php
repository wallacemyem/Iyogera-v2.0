<form method="POST" class="d-block ajaxForm" action="{{ route('librarian.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Librarian Name</label>
            <input type="text" class="form-control" id="name" name = "name" required value="{{ $user->name }}">
            <small id="" class="form-text text-muted">Provide Name.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name = "email" required value="{{ $user->email }}">
            <small id="" class="form-text text-muted">Provide Email.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name = "phone" required value="{{ $user->phone }}">
            <small id="" class="form-text text-muted">Provide Phone Number.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" @php if($user->gender == 'male') echo 'selected'; @endphp>Male</option>
                <option value="female" @php if($user->gender == 'female') echo 'selected'; @endphp>Female</option>
                <option value="others" @php if($user->gender == 'others') echo 'selected'; @endphp>Others</option>
            </select>
            <small id="" class="form-text text-muted">Provide Gender.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="blood_group">Blood Group</label>
            <select name="blood_group" id="blood_group" class="form-control" required>
                <option value="">Select a blood group</option>
                <option value="a+" @php if($user->blood_group == 'a+') echo 'selected'; @endphp>A+</option>
                <option value="a-" @php if($user->blood_group == 'a-') echo 'selected'; @endphp>A-</option>
                <option value="b+" @php if($user->blood_group == 'b+') echo 'selected'; @endphp>B+</option>
                <option value="b-" @php if($user->blood_group == 'b-') echo 'selected'; @endphp>B-</option>
                <option value="ab+" @php if($user->blood_group == 'ab+') echo 'selected'; @endphp>AB+</option>
                <option value="ab-" @php if($user->blood_group == 'ab-') echo 'selected'; @endphp>AB-</option>
                <option value="o+" @php if($user->blood_group == 'o+') echo 'selected'; @endphp>O+</option>
                <option value="o-" @php if($user->blood_group == 'o-') echo 'selected'; @endphp>O-</option>
            </select>
            <small id="" class="form-text text-muted">Provide Blood Group.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">Address</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required>{{ $user->address }}</textarea>
            <small id="" class="form-text text-muted">Provide Address.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Librarian</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'librarian_content');
    });
</script>
