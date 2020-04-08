@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-library title_icon"></i> {{ translate('books_issue') }}
                    <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('book_issue.create') }}', '{{ translate('issue_a_book') }}')"> <i class="mdi mdi-plus"></i> {{ translate('issue_book') }}</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-3">{{ translate('issues_book_list') }}</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <div class="form-group">
                                <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                                    <i class="mdi mdi-calendar"></i>&nbsp;
                                    <span id="selectedValue"> {{ date('F d, Y', strtotime(' -30 day')).' - '.date('F d, Y') }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="showAllBookIssues()">{{ translate('filter') }}</button>
                        </div>
                    </div>

                    <div class="table-responsive-sm" id = "book_issue_content">
                        @include('backend.'.Auth::user()->role.'.book_issue.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
<script>
    var showAllBookIssues = function () {
        var url = '{{ route("book_issue.list") }}';
        $.ajax({
            type : 'GET',
            url: url,
            data : {date : $('#selectedValue').text()},
            success : function(response) {
                $('#book_issue_content').html(response);
                initDataTable("basic-datatable");
            }
        });
    }
</script>
@endsection
