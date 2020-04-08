@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class=" mdi mdi-book-open-page-variant title_icon"></i> {{ translate('Pin Generator') }}                   
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- this calls the pin generator-->
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!--for alert-->
                     @if (session('status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('status') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                      </button>
                      </div>
                    @endif
                    <div id = "book_content">
                        <form method="POST" class="d-block" action="{{ route('pin.generate') }}">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="copies">{{ translate('number_of_Pins') }}</label>
                                        <input type="number" class="form-control" name = "copies" min="0" required>
                                        <small id="copies_help" class="form-text text-muted">{{ translate('provide total number of pin you need') }}.</small>
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <button class="btn btn-block btn-primary" type="submit">{{ translate('generate_pins') }}</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

