@extends('backend.layout.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Student Admission Form</h4>
        </div>
    </div>
</div>
<!-- end page title -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                        <div id="rootwizard">
                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                <li class="nav-item" data-target-form="#accountForm">
                                    <a href="#first" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline">Single Student Admission</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#second" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-account-group mr-1"></i>
                                        <span class="d-none d-sm-inline">Bulk Student Admission</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#otherForm">
                                    <a href="#third" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                        <span class="d-none d-sm-inline">Excel Upload</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mb-0 b-0">

                                <div class="tab-pane" id="first">
                                        <div class="row">
                                        <form method="POST" class="col-12 ajaxForm" action="{{ route('student.store') }}">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" id="email" name="email" value="{{ old('email') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password"> Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}"  value="{{ old('password') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="name"> Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}"  value="{{ old('name') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="parent_id"> Parent</label>
                                                        <div class="col-md-9">
                                                            <select id="parent_id" name="parent_id" class="form-control {{ $errors->has('parent_id') ? 'error' : '' }}" >
                                                                <option value="">Select A Parent</option>
                                                                @foreach (\App\User::where('school_id', get_settings('selected_branch'))->where('role', 4)->get() as $parent)
                                                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="class_id"> Class</label>
                                                        <div class="col-md-9">
                                                            <select name="class_id" id="class_id" class="form-control {{ $errors->has('class_id') ? 'error' : '' }}" onchange="classWiseSection(this.value)" >
                                                                <option value="">Class</option>
                                                                @foreach (App\Classes::where('school_id', 1)->get() as $class)
                                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="section_id"> Section</label>
                                                        <div class="col-md-9" id = "section_content">
                                                            <select name="section_id" id="section_id" class="form-control {{ $errors->has('section_id') ? 'error' : '' }}"  >
                                                                <option value="">Select A Class First</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="code">Student Code</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="code" name="code" class="form-control {{ $errors->has('code') ? 'error' : '' }}"  value="{{ substr(md5(uniqid(rand(), true)), 0, 7) }}" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control date {{ $errors->has('birthday') ? 'error' : '' }}" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="{{ old('birthday') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="gender">Gender</label>
                                                        <div class="col-md-9">
                                                            <select name="gender" id="gender" class="form-control {{ $errors->has('gender') ? 'error' : '' }}" >
                                                                <option value="">Select gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="example-textarea"> Address </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control {{ $errors->has('address') ? 'error' : '' }}" id="example-textarea" rows="5" name = "address" >{{ old('address') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="phone" name="phone" class="form-control {{ $errors->has('phone') ? 'error' : '' }}"  value="{{ old('phone') }}">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                            <button type="submit" class="btn btn-primary col-md-4 col-sm-12">Save Student</button>
                                                    </div>
                                                </form>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        {{-- Navigation button --}}
                                </div>

                                <div class="tab-pane fade" id="second">
                                        <div class="row">
                                            <div class="col-12">

                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                </div>

                                <div class="tab-pane fade" id="third">
                                        <div class="row">
                                            <div class="col-12">

                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                </div>
                            </div> <!-- tab-content -->
                        </div> <!-- end #rootwizard-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    {{-- <div class="notification is-danger">
        @php
            foreach ($errors->all() as $error){
                flash($error)->error();
            }
        @endphp
    </div> --}}
@endsection

@section('scripts')
    <script>
        function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content').html(response);
                }
            });
        }

        function onChangeSection(section_id) {

        }

        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'teacher_content');
        });
    </script>
@endsection
