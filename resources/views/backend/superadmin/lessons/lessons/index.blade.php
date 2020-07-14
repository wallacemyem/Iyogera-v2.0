@inject('request', 'Illuminate\Http\Request')
@extends('backend.layout.main')

@section('content')
    <h3 class="page-title">{{translate('lessons')}}</h3>
    
    <p>
        <a href="{{ route('lessons.create') }}" class="btn btn-success">{{translate('add_new')}}</a>
        
    </p>
    

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('lessons.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('lessons.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($lessons) > 0 ? 'datatable' : '' }} ('lesson_delete') @if ( request('show_deleted') != 1 ) dt-select @endif">
                <thead>
                    <tr>
                        
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        

                        <th>@lang('global.lessons.fields.course')</th>
                        <th>{{ translate('section')}}</th>
                        <th>@lang('global.lessons.fields.title')</th>
                        <th>@lang('global.lessons.fields.position')</th>
                        <th>@lang('global.lessons.fields.published')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($lessons) > 0)
                        @foreach ($lessons as $lesson)
                            <tr data-entry-id="{{ $lesson->id }}">
                                
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                
                                
                                <td>{{ $lesson->course->name }}</td>
                                <td>{{ $lesson->section->name }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->position }}</td>
                                <td>{{ Form::checkbox("published", 1, $lesson->published == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['lessons.restore', $lesson->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['lessons.perma_del', $lesson->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    
                                    <a href="{{ route('lessons.show',[$lesson->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    
                                    <a href="{{ route('lessons.edit',[$lesson->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['lessons.destroy', $lesson->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts') 
    <script>
        
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('lessons.mass_destroy') }}'; @endif
        

    </script>
@endsection