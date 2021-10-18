<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/c3.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">filter_vintage</i>
                <?php echo e($title); ?>

            </h4>
            <div class="m-t-10">
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' checked value='week' class='icheck'/> <?php echo e(trans('dashboard.weekly')); ?>

                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='month' class='icheck'/> <?php echo e(trans('dashboard.monthly')); ?>

                </label>
                <label class="radio-inline">
                    <input type='radio' id='category' name='category' value='year' class='icheck'/> <?php echo e(trans("dashboard.yearly")); ?>

                </label>
            </div>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div id="event-chart" class="index-invo"></div>
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('event.name')); ?></th>
                        <th><?php echo e(trans('event.owner')); ?></th>
                        <th><?php echo e(trans('event.date')); ?></th>
                        <th><?php echo e(trans('table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menuItemModel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo e(trans('event.menuItems')); ?></h4>
                </div>
                <div class="modal-body" id="menu_items_data">

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.v3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/c3.min.js')); ?>"></script>

    <script>

        function showMenu(value) {
            $.ajax({
                url:'<?php echo e(url('event/getEventMenu')); ?>',
                get :"get",
                data:{id:value,_token:'<?php echo e(csrf_token()); ?>'},
                success:function(data){
                    var html = '';
                    var count = 0;
                    for (var key in data) {
                        html += '<div class="event-collapse-div collapsed" data-toggle="collapse" data-parent="#accordion" href="#subMenuItem_'+count+'">' +
                        '<div class="row">' +
                        '<div class="col-md-6 text-left"><b>'+key+'</b></div>' +
                        '<div class="col-md-6 text-right"><i class="fa fa-fw fa-chevron-down"></i><i class="fa fa-fw fa-chevron-right"></i></div>' +
                        '</div>' +
                        '</div>' +
                        '<div id="subMenuItem_'+count+'" class="collapse multi-collapse">' +
                        '<div class="event_collapse_padding form-panel-collapse">' +
                        '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<div>' +
                        '<?php echo Form::label("room", trans("event.subMenuItems"), ["class" => "control-label"]); ?>' +
                        '<div>';

                        data[key].forEach(function(val,k){
                            html += '<label>' + val +',</label>';
                        });

                        html += '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                        count = count +1;
                    }
                    console.log(html);
                    $('#menu_items_data').html(html);
                    $('#menuItemModel').modal('show');
                }
            });
        }

        $(function () {
            var data_event = [
                ['Events'],
                    <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item['event']); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

            var chart_event = c3.generate({
                bindto: '#event-chart',
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

                <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if ('<?php echo e($id); ?>' == d) {
                    return '<?php echo e($item['month']); ?>' + ' ' + '<?php echo e($item['year']); ?>'
                }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            oTable.ajax.url('<?php echo url($type.'/data'); ?>/' + $(this).val());
            oTable.ajax.reload();

            $.ajax({
                url: '<?php echo url($type.'/getChart'); ?>/' + $(this).val(),
                type: "get",
                success: function (data) {
                    var data_event = [
                        ['Events']
                    ];
                    data.forEach(function (value, key) {
                        data_event.push([value.event]);
                    });

                    var chart_event = c3.generate({
                        bindto: '#event-chart',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>