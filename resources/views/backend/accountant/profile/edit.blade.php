<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ translate('update_profile') }}</h4>
                <form method="POST" class="col-12 profileAjaxForm" action="{{ route('profile.update', 'profile') }}" id = "profileAjaxForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"> {{ translate('name') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" class="form-control"  value="{{ Auth::user()->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">{{ translate('email') }}</label>
                            <div class="col-md-9">
                                <input type="email" id="email" name="email" class="form-control"  value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone"> {{ translate('phone') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control"  value="{{ Auth::user()->phone }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address"> {{ translate('address') }}</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="address" name = "address" rows="5" required>{{ Auth::user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput"> {{ translate('update_user_image') }}</label>
                            <div class="col-md-9">
                                <input type="file" id="example-fileinput" name="user_image" class="form-control-file">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateProfileInfo()">{{ translate('update_profile') }}</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ translate('change_password') }}</h4>
                <form method="POST" class="col-12 changePasswordAjaxForm" action="{{ route('profile.update', 'password') }}" id = "changePasswordAjaxForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"> {{ translate('old_password') }}</label>
                            <div class="col-md-9">
                                <input type="password" id="old_password" name="old_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"> {{ translate('new_password') }}</label>
                            <div class="col-md-9">
                                <input type="password" id="new_password" name="new_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"> {{ translate('confirm_password') }}</label>
                            <div class="col-md-9">
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="changePassword()">{{ translate('change_password') }}</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>
