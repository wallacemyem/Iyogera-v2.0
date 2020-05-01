<form method="POST" class="d-block ajaxForm" action="{{ route('accountant.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">{{ translate('accountant_name') }}</label>
            <input type="text" class="form-control" id="name" name = "name" required value="{{ $user->name }}">
            <small id="" class="form-text text-muted">{{ translate('provide_name') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="email">{{ translate('email') }}</label>
            <input type="email" class="form-control" id="email" name = "email" required value="{{ $user->email }}">
            <small id="" class="form-text text-muted">{{ translate('provide_email') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">{{ translate('phone_number') }}</label>
            <input type="text" class="form-control" id="phone" name = "phone" required value="{{ $user->phone }}">
            <small id="" class="form-text text-muted">{{ translate('provide_phone_number') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="gender">{{ translate('gender') }}</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" @php if($user->gender == 'male') echo 'selected'; @endphp>Male</option>
                <option value="female" @php if($user->gender == 'female') echo 'selected'; @endphp>Female</option>
                <option value="others" @php if($user->gender == 'others') echo 'selected'; @endphp>Others</option>
            </select>
            <small id="" class="form-text text-muted">{{ translate('provide_gender') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="blood_group">{{ translate('blood_group') }}</label>
            <select name="blood_group" id="blood_group" class="form-control" required>
                <option value="">{{ translate('select_a_blood_group') }}</option>
                <option value="a+" @php if($user->blood_group == 'a+') echo 'selected'; @endphp>A+</option>
                <option value="a-" @php if($user->blood_group == 'a-') echo 'selected'; @endphp>A-</option>
                <option value="b+" @php if($user->blood_group == 'b+') echo 'selected'; @endphp>B+</option>
                <option value="b-" @php if($user->blood_group == 'b-') echo 'selected'; @endphp>B-</option>
                <option value="ab+" @php if($user->blood_group == 'ab+') echo 'selected'; @endphp>AB+</option>
                <option value="ab-" @php if($user->blood_group == 'ab-') echo 'selected'; @endphp>AB-</option>
                <option value="o+" @php if($user->blood_group == 'o+') echo 'selected'; @endphp>O+</option>
                <option value="o-" @php if($user->blood_group == 'o-') echo 'selected'; @endphp>O-</option>
            </select>
            <small id="" class="form-text text-muted">{{ translate('provide_blood_group') }}.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">{{ translate('address') }}</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required>{{ $user->address }}</textarea>
            <small id="" class="form-text text-muted">{{ translate('provide_address') }}.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">{{ translate('update_accountant') }}</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllAccountants);
    });
</script>
