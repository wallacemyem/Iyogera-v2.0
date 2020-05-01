<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ translate('paypal_settings') }}</h4>
                    <form method="POST" class="col-12 paypalAjaxForm" action="{{ route('payment.update', 'paypal') }}" id = "paypal_settings">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="paypal_active"> {{ translate('active') }} </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="paypal_active" id="paypal_active">
                                        <option value="yes" @if(get_settings('paypal_active') == 'yes') selected @endif>{{ translate('yes') }}</option>
                                        <option value="no" @if(get_settings('paypal_active') == 'no') selected @endif>{{ translate('no') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="paypal_mode">{{ translate('mode') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="paypal_mode" id="paypal_mode">
                                        <option value="sandbox" @if(get_settings('paypal_mode') == 'sandbox') selected @endif>{{ translate('sandbox') }}</option>
                                        <option value="production" @if(get_settings('paypal_mode') == 'production') selected @endif>{{ translate('production') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="paypal_client_id_sandbox"> {{ translate('client_id_(sandbox)') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="paypal_client_id_sandbox" name="paypal_client_id_sandbox" class="form-control"  value="{{ get_settings('paypal_client_id_sandbox') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="paypal_client_id_production"> {{ translate('client_id_(production)') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="paypal_client_id_production" name="paypal_client_id_production" class="form-control"  value="{{ get_settings('paypal_client_id_production') }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updatePaypalInfo()">{{ translate('update_paypal_settings') }}</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ translate('stripe_settings') }}</h4>
                    <form method="POST" class="col-12 stripeAjaxForm" action="{{ route('payment.update', 'stripe') }}" id = "stripe_settings">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_active"> {{ translate('active') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="stripe_active" id="stripe_active">
                                        <option value="yes" @if(get_settings('stripe_active') == 'yes') selected @endif>{{ translate('yes') }}</option>
                                        <option value="no" @if(get_settings('stripe_active') == 'no') selected @endif>{{ translate('no') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_mode">{{ translate('test_mode') }}</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="stripe_mode" id="stripe_mode">
                                        <option value="on" @if(get_settings('stripe_mode') == 'on') selected @endif>{{ translate('on') }}</option>
                                        <option value="off" @if(get_settings('stripe_mode') == 'off') selected @endif>{{ translate('off') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_test_secret_key"> {{ translate('test_secret_key') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="stripe_test_secret_key" name="stripe_test_secret_key" class="form-control"  value="{{ get_settings('stripe_test_secret_key') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_test_public_key"> {{ translate('test_public_key') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="stripe_test_public_key" name="stripe_test_public_key" class="form-control"  value="{{ get_settings('stripe_test_public_key') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_live_secret_key"> {{ translate('live_secret_key') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="stripe_live_secret_key" name="stripe_live_secret_key" class="form-control"  value="{{ get_settings('stripe_live_secret_key') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="stripe_live_public_key"> {{ translate('live_public_key') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="stripe_live_public_key" name="stripe_live_public_key" class="form-control"  value="{{ get_settings('stripe_live_public_key') }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateStripeInfo()">{{ translate('update_stripe_settings') }}</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
