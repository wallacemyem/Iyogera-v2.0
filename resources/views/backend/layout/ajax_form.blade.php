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
                    (response.status === true) ? var notyf = new Notyf();
            notyf.success(response.notification) : var notyf = new Notyf();
            notyf.error(response.notification);
                    callBackFunction();
                    if(form.attr('id') != 'paypal_settings' && form.attr('id') != 'stripe_settings') {
                        form.trigger("reset");
                    }
                }
            });
        }else {
           var notyf = new Notyf();
            notyf.error('You must fill out the form before moving forward');
        }
    }
</script>
