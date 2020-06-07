@extends('backend.layout.main')

@section('content')
    <h3 class="page-title">@lang('global.tests.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.tests.fields.course')</th>
                            <td>{{ $test->course->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.lesson')</th>
                            <td>{{ $test->lesson->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.title')</th>
                            <td>{{ $test->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.description')</th>
                            <td>{!! $test->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.questions')</th>
                            <td>
                                @foreach ($test->questions as $singleQuestions)
                                    <span class="label label-info label-many">{{ $singleQuestions->question }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.tests.fields.published')</th>
                            <td>{{ Form::checkbox("published", 1, $test->published == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('test.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop