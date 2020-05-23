
<script type="text/javascript">

    var callBackFunction;

    function showAjaxModal(url, header)
    {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#right-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="{{ asset('backend/images/loader.gif') }}" style="height:25px;" /></div>');
    jQuery('#right-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#right-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#right-modal .modal-body').html(response);
        jQuery('#right-modal .modal-title').html(header);
      }
    });
    }

    function showLargeAjaxModal(url)
    {
        jQuery('#large-modal').modal('show', {backdrop: 'true'});
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#large-modal .modal-body').html(response);
            }
        });
    }
    </script>

    <!-- Right modal content -->
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-right">
            <div class="modal-content">

                <div class="modal-header border-1">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body " style="overflow-x:scroll;">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!--  Large Modal -->
    <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                        @php
                            $selected_branch_id = school_id();
                            $selected_branch = \App\School::find($selected_branch_id);
                            echo $selected_branch->name;
                        @endphp
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    <script type="text/javascript">

    function confirm_modal(delete_url, param)
    {
        jQuery('#alert-modal').modal('show', {backdrop: 'static'});
        callBackFunction = param;
        document.getElementById('delete_form').setAttribute('action' , delete_url);
    }
    </script>

     <!-- Info Alert Modal -->
     <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-info"></i>
                            <h4 class="mt-2">INFO</h4>
                            <p class="mt-3">Are you sure?</p>
                            <form method="POST" class="ajaxDeleteForm" action="" id = "delete_form">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-info my-2" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger my-2" onclick="">Yes</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<script>
    jQuery(".ajaxDeleteForm").submit(function(e) {

        var form = $(this);
        ajaxSubmit(e, form, callBackFunction);
    });
</script>
