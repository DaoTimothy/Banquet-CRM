@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop

{{-- Content --}}
@section('content')
    <div class="page-header clearfix">
        @if($user_data->hasAccess(['logged_calls.write']) || $user_data->inRole('admin'))
            <div class="pull-right">
                <a href="{{ url($type.'/'.$lead->id.'/create') }}" class="btn btn-primary call-summary">
                    <i class="fa fa-plus-circle"></i> {{ trans('lead.call') }}</a>
            </div>
        @endif
    </div>
    <input type="hidden" id="id" value="{{$lead->id}}">

    <div class="panel panel-default cnts">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="fa fa-fw fa-bell-o"></i>
                {{ $title }}
            </h4>
            <span class="pull-right collapse-btn">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
                {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
            </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered" data-id="data">
                    <thead>
                    <tr>
                        <th>{{ trans('call.date') }}</th>
                        <th width="40%">{{ trans('call.summary') }}</th>
                        <th>{{ trans('call.company_name') }}</th>
                        <th>{{ trans('salesteam.main_staff') }}</th>
                        <th>{{ trans('table.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop