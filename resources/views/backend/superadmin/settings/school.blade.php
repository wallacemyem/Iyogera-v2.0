<div class="row justify-content-md-center">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ translate('school_settings') }}</h4>
                    <form method="POST" class="col-12 schoolForm" action="{{ route('school.update', $school_data->id) }}" id = "schoolForm">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="school_name"> {{ translate('school_name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="school_name" name="school_name" class="form-control"  value="{{ $school_data->name }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone">{{ translate('ID Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="id_short" name="id_short" class="form-control"  value="{{ $school_data->short }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone">{{ translate('phone') }}</label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control"  value="{{ $school_data->phone }}" required>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="address"> {{ translate('address') }}</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="address" name = "address" rows="5" required>{{ $school_data->address }}</textarea>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSchoolInfo()">{{ translate('update_settings') }}</button>
                            </div>
                        </div>
                    </form>
                        
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>