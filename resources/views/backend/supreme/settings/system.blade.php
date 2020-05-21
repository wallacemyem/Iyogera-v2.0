
<div class="row">
    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ translate('system_settings') }}</h4>
                <form method="POST" class="col-12" action="{{ route('system.update') }}" id = "system_settings">
                    @csrf
                    @method('PATCH')
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_name"> {{ translate('system_name') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="system_name" name="system_name" class="form-control"  value="{{ get_settings('system_name') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_title">{{ translate('title') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="system_title" name="system_title" class="form-control"  value="{{ get_settings('system_title') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="system_email"> {{ translate('school_email') }}</label>
                            <div class="col-md-9">
                                <input type="email" id="system_email" name="system_email" class="form-control"  value="{{ get_settings('system_email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone"> {{ translate('phone') }}</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control"  value="{{ get_settings('phone') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address"> {{ translate('address') }}</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="address" name = "address" rows="5" required>{{ get_settings('address') }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="purchase_code"> {{ translate('timezone') }}</label>
                            
                            <div class="col-md-9">
                                <select class="form-control select2" data-toggle="select2" name="timezone">
                                    @php
                                        $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                                    @endphp
                                    @foreach ($tzlist as $tz)
                                        <option value="{{ $tz }}" @if(env('TIMEZONE') == $tz) selected @endif>{{ $tz }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSystemInfo($('#system_name').val())">{{ translate('update_settings') }}</button>
                        </div>
                    </div>
                </form>
                    
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ translate('system_logo') }}</h4>    
                <form method="POST" class="col-12 systemLogoAjaxForm" action="{{ route('logo.update') }}" id = "system_settings" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label"> {{ translate('current_logo') }}</label>
                            <div class="col-md-9">
                                <img src="{{'backend/images/logo-dark.png'}}" alt="" height="50">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput"> {{ translate('update_system_logo') }}</label>
                            <div class="col-md-9">
                                <input type="file" id="example-fileinput" name="logo" class="form-control-file">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-6 col-md-12 col-sm-12" onclick="updateSystemLogo()">{{ translate('update_logo') }}</button>
                        </div>
                    </div>
                </form>     
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>