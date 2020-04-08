@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-book-open-page-variant title_icon"></i> {{ translate('subject') }}
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('subject.create') }}', '{{ translate('add_new_subject') }}')"> <i class="mdi mdi-plus"></i>{{ translate('add_subject') }}</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="class_id" id="class_id">
                                <option value="all">{{ translate('all_class') }}</option>
                                @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="classWiseSubject()">Filter</button>
                        </div>
                    </div>
                    <div id = "subject_content">
                        @include('backend.'.Auth::user()->role.'.subject.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSubject() {
            var class_id = $('#class_id').val();
            var url = '{{ route("subject.show", "class_id") }}';
            url = url.replace('class_id', class_id);
            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#subject_content').html(response);
                    initDataTable("basic-datatable");
                }
            });
        }
    </script>
@endsection
