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
            <label class="radio-inline">
                    <input type='radio' id='category' name='category' checked value='week' class='icheck'/> <?php echo e(trans('dashboard.weekly')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='month' class='icheck'/> <?php echo e(trans('dashboard.monthly')); ?>

            </label>
            <label class="radio-inline">
                <input type='radio' id='category' name='category' value='year' class='icheck'/> <?php echo e(trans("dashboard.yearly")); ?>

            </label>
            <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div id="event-chart" class="index-invo"></div>
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.v3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/c3.min.js')); ?>"></script>

    <script>
        $(function(){
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
                url:'<?php echo url($type.'/getChart'); ?>/' + $(this).val(),
                type:"get",
                success:function(data){
                    var data_event = [
                        ['Events']
                    ];
                    data.forEach(function(value,key){
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