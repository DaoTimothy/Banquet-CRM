@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}" type="text/css">
@stop


@section('content')
    <div class="page-header clearfix">
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
            @if (isset($data))
                {!! Form::model($data, ['url' => $type . '/' . $data->id .'/eventTypeUpdate', 'method' => 'put', 'files'=> true, 'id'=>'eventSetting']) !!}
            @else
                {!! Form::open(['url' => $type.'/eventTypeStore', 'method' => 'post', 'files'=> true, 'id' => 'eventSetting']) !!}
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group required {{ $errors->has('eventType') ? 'has-error' : '' }}">
                        {!! Form::label('eventType', trans('eventSetting.eventType'), ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control','id'=>'eventType']) !!}
                            <span class="help-block">{{ $errors->first('eventType', ':message') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('eventSetting.add')}}</button>
                    <a href="{{ url($type.'/eventTypes') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> {{trans('table.back')}}</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/tagsinput.js') }}"></script>

    <script>
        $(document).submit(function (event) {
            if ($("#eventType").val() == '') {
                toastr["error"]("Enter Event type");
                event.preventDefault();
                return;
            }
        });
    </script>
@endsection