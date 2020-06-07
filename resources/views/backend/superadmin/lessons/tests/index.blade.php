@inject('request', 'Illuminate\Http\Request')
@extends('backend.layout.main')

@section('content')
    <h3 class="page-title">@lang('global.tests.title')</h3>
    
    <p>
        <a href="{{ route('test.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('test.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('test.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tests) > 0 ? 'datatable' : '' }}  @if ( request('show_deleted') != 1 ) dt-select @endif ">
                <thead>
                    <tr>
                        
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        

                        <th>@lang('global.tests.fields.course')</th>
                        <th>@lang('global.tests.fields.lesson')</th>
                        <th>@lang('global.tests.fields.title')</th>
                        <th>@lang('global.tests.fields.description')</th>
                        <th>@lang('global.tests.fields.questions')</th>
                        <th>@lang('global.tests.fields.published')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tests) > 0)
                        @foreach ($tests as $test)
                            <tr data-entry-id="{{ $test->id }}">
                                
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                             
                                    
                                <td>{{ $test->course->name }}</td>
                                <td>{{ $test->lesson->title }}</td>
                                <td>{{ $test->title }}</td>
                                <td>{!! $test->description !!}</td>
                                <td>{{ $test->questions->count() }}</td>
                                <td>{{ Form::checkbox("published", 1, $test->published == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['tests.restore', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['tests.perma_del', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    
                                    <a href="{{ route('test.show',[$test->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    
                                    <a href="{{ route('test.edit',[$test->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                   
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['test.destroy', $test->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('tests.mass_destroy') }}'; @endif
        
    </script>
@endsection