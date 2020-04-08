<script>
    function ajaxSubmit(e, form, callBackFunction) {

        if(form.valid()) {
            e.preventDefault();

            var action = form.attr('action');
            (form.attr('class') === 'ajaxDeleteForm') ? $('#alert-modal').modal('toggle') : $('#right-modal').modal('hide');
            var form2 = e.target;
            var data = new FormData(form2);
            $.ajax({
                type: "POST",
                url: action,
                processData: false,
                contentType: false,
                data: data,
                success: function(response)
                {
                    (response.status === true) ? toastr.success(response.notification) : toastr.error(response.notification);
                    callBackFunction();
                    if(form.attr('id') != 'paypal_settings' && form.attr('id') != 'stripe_settings') {
                        form.trigger("reset");
                    }
                }
            });
        }else {
            toastr.error('Please make sure to fill all the necessary fields');
        }
    }
</script>
