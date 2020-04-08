<form method="POST" action="{{ route('student.update', $student->id) }}">
    @csrf
    @method('PATCH')
    <div class="col-12">

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"> {{ translate('student_profile_image') }}</label>
            <div class="col-md-9">
                <input type="file" id="example-fileinput" name="student_image" class="form-control-file">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="name"> {{ translate('name') }}</label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control"  value="{{ $student->user->name }}" required>
            </div>
        </div>

@php
    $query = \App\Enroll::where(array('student_id' => $student->id, "session" => get_settings('running_session')))->first();
    $class_id   = $query->class_id;
    $section_id = $query->section_id;
@endphp
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id"> {{ translate('class') }}</label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                    <option value="">Class</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}" @if($class_id == $class->id) selected @endif>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="section_id"> {{ translate('section') }}</label>
            <div class="col-md-9" id = "section_content">
                @php
                    $sections = \App\Section::where('class_id', $class_id)->get();
                @endphp
                <select name="section_id" id="section_id" class="form-control" required >
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" @if($section_id == $section->id) selected @endif>{{ $section->name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birthdatepicker">{{ translate('birthday') }}</label>
            <div class="col-md-9">
                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="{{ date('m/d/Y', $student->user->birthday) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="gender">{{ translate('gender') }}</label>
            <div class="col-md-9">
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select gender</option>
                    <option value="male" @if($student->user->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if($student->user->gender == 'female') selected @endif>Female</option>
                    <option value="others" @if($student->user->gender == 'others') selected @endif>Others</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-textarea"> {{ translate('address') }} </label>
            <div class="col-md-9">
                <textarea class="form-control" id="example-textarea" rows="5" name = "address" >{{ $student->user->address }}</textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="phone"> {{ translate('phone') }}</label>
            <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control"  value="{{ $student->user->phone }}" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12">{{ translate('update_student') }}</button>
        </div>
    </form>
