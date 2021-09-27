@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/c3.min.css') }}">
@stop

{{-- Content --}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">blur_linear</i>
                {{ $title }}
            </h4>
            <div class="m-t-10">
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' checked value='day' class='icheck'/> {{trans('dashboard.day')}}
                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' checked value='week' class='icheck'/> {{trans('dashboard.weekly')}}
                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='month' class='icheck'/> {{trans('dashboard.monthly')}}
                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='quarter' class='icheck'/> {{trans("dashboard.quarter")}}
                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='year' class='icheck'/> {{trans("dashboard.yearly")}}
                </label>
            </div>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>

        <div class="panel-body">
            <div id="lead-chart" class="index-invo"></div>
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('lead.creation_date') }}</th>
                        {{--<th>{{ trans('lead.company_name') }}</th>--}}
                        <th>{{ trans('lead.agent_name') }}</th>
                        {{--<th>{{ trans('lead.product_name') }}</th>--}}
                        <th>{{ trans('lead.email') }}</th>
                        <th>{{ trans('lead.phone') }}</th>
                        <th>{{ trans('lead.percentage') }}</th>
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
    <script type="text/javascript" src="{{ asset('js/d3.v3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/c3.min.js')}}"></script>

    <script>
        $(function () {
            var data_event = [
                ['Leads'],
                    @foreach($lead as $item)
                [{{$item['leads']}}],
                @endforeach
            ];

            var chart_event = c3.generate({
                bindto: '#lead-chart',
                data: {
                    rows: data_event,
                    type: 'area-spline'
                },
                color: {
                    pattern: ['#FD9883']
                },
                axis: {
                    x: {
                        tick: {
                            format: function (d) {
                                return formatMonth(d);
                            }
                        }
                    },
                    y: {
                        tick: {
                            format: d3.format('d')
                        }
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                },
                padding: {
                    top: 10
                }
            });

            function formatMonth(d) {

                @foreach($lead as $id => $item)
                if ('{{$id}}' == d) {
                    return '{{$item['month']}}' + ' ' + '{{$item['year']}}'
                }
                @endforeach
            }

            setTimeout(function () {
                chart_event.resize();
            }, 2000);

            setTimeout(function () {
                chart_event.resize();
            }, 4000);

            setTimeout(function () {
                chart_event.resize();
            }, 6000);
            $("[data-toggle='offcanvas']").click(function (e) {
                chart_event.resize();
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
    <script>
        $('input[type=radio]').on('ifChecked', function (event) {
            oTable.ajax.url('{!! url($type.'/data') !!}/' + $(this).val());
            oTable.ajax.reload();

            $.ajax({
                url: '{!! url($type.'/getSalesChart') !!}/' + $(this).val(),
                type: "get",
                success: function (data) {
                    var data_event = [
                        ['Leads']
                    ];
                    data.forEach(function (value, key) {
                        data_event.push([value.leads]);
                    });

                    var chart_event = c3.generate({
                        bindto: '#lead-chart',
                        data: {
                            rows: data_event,
                            type: 'area-spline'
                        },
                        color: {
                            pattern: ['#FD9883']
                        },
                        axis: {
                            x: {
                                tick: {
                                    format: function (d) {
                                        return formatMonth(d);
                                    }
                                }
                            },
                            y: {
                                tick: {
                                    format: d3.format('d')
                                }
                            }
                        },
                        legend: {
                            show: true,
                            position: 'bottom'
                        },
                        padding: {
                            top: 10
                        }
                    });

                    function formatMonth(d) {
                        return data[d].month + ' ' + data[d].year;
                    }

                    setTimeout(function () {
                        chart_event.resize();
                    }, 2000);

                    setTimeout(function () {
                        chart_event.resize();
                    }, 4000);

                    setTimeout(function () {
                        chart_event.resize();
                    }, 6000);
                    $("[data-toggle='offcanvas']").click(function (e) {
                        chart_event.resize();
                    });
                }

            });
        });
    </script>
@stop