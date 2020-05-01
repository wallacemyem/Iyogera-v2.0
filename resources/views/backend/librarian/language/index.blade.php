@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-translate title_icon"></i> {{ __('language_manager') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded mb-1 alignToTitle" onclick="showAjaxModal('{{ route('language.create') }}', '{{ translate('create_new_language') }}')"> <i class="mdi mdi-plus"></i> {{ translate('add_language') }}</button>
            </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-md-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div id = "language_content">
                        @include('backend.'.Auth::user()->role.'.language.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllLanguages = function () {
        var url = '{{ route("language.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#language_content').html(response);
                initDataTable("basic-datatable");
                location.reload();
            }
        });
    }

    function updatePhrase(key) {
        var language_id = $('#language_id_'+key).val();
        var value   = $('#key_'+key).val();
        var url = '{{ route("phrase.update") }}';
            $.ajax({
                type : 'POST',
                data : {id : language_id, key : key, value : value, _token : '{{ @csrf_token() }}' },
                url: url,
                success : function(response) {
                    toastr.success('Phrase has been updated successfully. please reload the browser');
                }
            });
        }
</script>
@endsection
