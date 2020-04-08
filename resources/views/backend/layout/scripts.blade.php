
    <script src="{{ asset('backend/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/js/pages/demo.dashboard.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/demo.datatable-init.js') }}"></script>
    <script src="{{ asset('backend/js/pages/demo.form-wizard.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/fullcalendar.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/pages/demo.calendar.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>


    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if($message['level'] == 'success')
            <script type="text/javascript">
                toastr.success('{{ $message['message'] }}');
            </script>
        @else
            <script type="text/javascript">
                toastr.error('{{ $message['message'] }}');
            </script>
        @endif
    @endforeach

    <script>
        function initDataTable(tableId) {
            $("#"+tableId).DataTable({
                keys: !0,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        }
    </script>
