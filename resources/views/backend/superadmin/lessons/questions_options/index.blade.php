@inject('request', 'Illuminate\Http\Request')
@extends('backend.layout.main')

@section('content')
    <h3 class="page-title">@lang('global.questions-options.title')</h3>
    
    <p>
        <a href="{{ route('questions_options.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('questions_options.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('questions_options.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($questions_options) > 0 ? 'datatable' : '' }} ('questions_option_delete') @if ( request('show_deleted') != 1 ) dt-select @endif ">
                <thead>
                    <tr>
                        
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                       

                        <th>@lang('global.questions-options.fields.question')</th>
                        <th>@lang('global.questions-options.fields.option-text')</th>
                        <th>@lang('global.questions-options.fields.correct')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($questions_options) > 0)
                        @foreach ($questions_options as $questions_option)
                            <tr data-entry-id="{{ $questions_option->id }}">
                               
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                

                                <td>{{ $questions_option->question->question }}</td>
                                <td>{!! $questions_option->option_text !!}</td>
                                <td>{{ Form::checkbox("correct", 1, $questions_option->correct == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions_options.restore', $questions_option->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions_options.perma_del', $questions_option->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    
                                    <a href="{{ route('questions_options.show',[$questions_option->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    
                                    <a href="{{ route('questions_options.edit',[$questions_option->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions_options.destroy', $questions_option->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('questions_options.mass_destroy') }}'; @endif
        

    </script>
@endsection