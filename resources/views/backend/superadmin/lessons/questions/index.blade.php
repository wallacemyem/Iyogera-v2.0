@inject('request', 'Illuminate\Http\Request')
@extends('backend.layout.main')

@section('content')
    <h3 class="page-title">@lang('global.questions.title')</h3>
    
    <p>
        <a href="{{ route('questions.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('questions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('questions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }}  @if ( request('show_deleted') != 1 ) dt-select @endif ">
                <thead>
                    <tr>
                       
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        

                        <th>@lang('global.questions.fields.question')</th>
                        <th>@lang('global.questions.fields.question-image')</th>
                        <th>@lang('global.questions.fields.score')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                

                                <td>{!! $question->question !!}</td>
                                <td>@if($question->question_image)<a href="{{ asset('uploads/' . $question->question_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $question->question_image) }}"/></a>@endif</td>
                                <td>{{ $question->score }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions.restore', $question->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions.perma_del', $question->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    
                                    <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    
                                    <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    
                                    
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['questions.destroy', $question->id])) !!}
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
      
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('questions.mass_destroy') }}'; @endif
       
    </script>
@endsection