@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop

{{-- Content --}}
@section('content')
    <div class="page-header clearfix">
        <div class="pull-right">
            @if($user_data->hasAccess(['staff.write']) || $user_data->inRole('admin'))
                <a href="{{ $type.'/create' }}" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> {{ trans('staff.create_staff') }}</a>
            @endif
            @if($user_data->inRole('admin'))
                <a href="{{ $type.'/invite' }}" class="btn btn-warning">
                    <i class="fa fa-envelope"></i> {{ trans('staff.invite') }}</a>
            @endif
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">people_outline</i>
                {{ $title }}
            </h4>
            <span class="pull-right"><i class="fa fa-fw fa-chevron-up clickable"></i></span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover    ">
                    <thead>
                    <tr>
                        <th>{{ trans('customer.full_name') }}</th>
                        <th>{{ trans('customer.email') }}</th>
                        <th>{{ trans('customer.register') }}</th>
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