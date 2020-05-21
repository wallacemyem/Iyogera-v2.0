@php
    if($settings_type == 'system')
        $class = 'col-xl-12';
    else if($settings_type == 'payment')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'language')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'sms')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'smtp')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'school')
        $class = 'col-xl-10 offset-xl-1';
@endphp

@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-settings title_icon"></i>{{ ucfirst($settings_type) }} {{ translate('settings') }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div id = "settings_content" class="{{ $class }}">
            @include('backend.'.Auth::user()->role.'.settings.'.$settings_type)
        </div>
    </div>
@endsection


@section('scripts')

    <script>
        const API_publicKey = "FLWPUBK_TEST-67113238a05c19528495cc02c5a885be-X";

        var email = $("#email").val();
        var amount = $("#amount").val();
        function payWithRave() {
            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: email,
                amount: amount,
                customer_phone: "234099940409",
                currency: "NGN",
                txref: "rave-123456",
                meta: [{
                    metaname: "flightID",
                    metavalue: "AP1234"
                }],
                onclose: function() {},
                callback: function(response) {
                    var txref = response.data.txRef; // collect txRef returned and pass to a                    server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.data.tx.chargeResponseCode == "00" ||
                        response.data.tx.chargeResponseCode == "0"
                    ) {
                        // redirect to a success page
                        new Toast({
                              message: 'payment successful',
                              type: 'success'
                            });
                    } else {
                        // redirect to a failure page.
                        new Toast({
                              message: 'payment failed',
                              type: 'danger'
                            });
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    </script>
    <script>
            function updateSystemInfo(system_name) {
                $(".systemAjaxForm").validate({});
                $(".systemAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function updateSystemLogo() {
                $(".systemLogoAjaxForm").validate({});
                $(".systemLogoAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }


            function updatePaypalInfo() {
                $(".paypalAjaxForm").validate({});
                $(".paypalAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function updateStripeInfo() {
                $(".stripeAjaxForm").validate({});
                $(".stripeAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function updateSmtpInfo() {
                $(".stripeSmtpForm").validate({});
                $(".stripeSmtpForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function updateSchoolInfo() {
                $(".schoolForm").validate({});
                $(".schoolForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, reload);
                });
            }

            function reload() {
                setTimeout(
                    function()
                    {
                        location.reload();
                    }, 1000);
            }
    </script>
@endsection
