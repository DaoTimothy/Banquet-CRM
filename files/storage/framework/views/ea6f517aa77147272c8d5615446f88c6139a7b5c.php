<?php $__env->startSection('title'); ?>
    <?php echo e(trans('dashboard.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-jvectormap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/c3.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mar-20">
        <div class="col-sm-12 col-md-8 col-lg-8 top_left_block"><div class="row">
            <div class="col-sm-4 col-lg-4">
                <div class="cnts top_box blue">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="<?php echo e(url('lead')); ?>">
                                <h2 id="countno2"></h2>
                                <p><?php echo e(trans('dashboard.leads')); ?></p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="top_icon">
                                <div class="dashboard-chart" id="leadChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="cnts top_box green">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="<?php echo e(url('event')); ?>">
                                <h2 id="countno3"></h2>
                                <p><?php echo e(trans('dashboard.events')); ?></p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="top_icon">
                                <div class="dashboard-chart" id="eventChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="cnts top_box orange">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="<?php echo e(url('sales_order')); ?>">
                                <h2 id="countno5"></h2>
                                <p><?php echo e(trans('dashboard.definite')); ?></p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="top_icon">
                                <div class="dashboard-chart" id="salesOrderChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                <div class=" col-md-12 col-lg-6">
                    <div class="cnts">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <a><h4><?php echo e(trans('dashboard.eventVsLead')); ?></h4></a>
                            </div>
                            
                        </div>
                        <div id='chart_opp_lead'></div>
                    </div>
                </div>
                <div class=" col-md-12 col-lg-6">
                    <div class="cnts ">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <a href="<?php echo e(url('supplierReport')); ?>"><h4><?php echo e(trans('dashboard.supplier')); ?></h4></a>
                            </div>
                            
                        </div>
                        <div id="sales"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 top-right-block">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cnts">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><?php echo e(trans('dashboard.actlog')); ?></h4>
                                <a class="view_all pull-right" href="<?php echo e(url('getAllActivityLog')); ?>">view all</a>
                            </div>
                        </div>
                        <div class="log_body">
                            <div class="steamline">
                                <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($activities['type'] == 'event'): ?>

                                        <div class="bnq-item create_event">
                                            <div class="bnq-left"> <img class="img-circle" alt="user" src="<?php echo e(($activities['image'] != '') ? url('uploads/avatar/'.$activities['image']) : url('uploads/avatar/user.png')); ?>"> </div>
                                            <div class="bnq-right">
                                                <div><a class="name-info new_lead" href="<?php echo e(url('staff/'.$activities['user_id'].'/show')); ?>"><?php echo e($activities['user']); ?></a> <span class="bnq-date"> <?php echo e($activities['time_diff']); ?></span></div>
                                                <?php if($activities['status'] == 'created'): ?>
                                                    <p>Created Event for <b><?php echo e($activities['client']); ?></b> <?php echo e($activities['event_type']); ?></p>
                                                <?php else: ?>
                                                    <p><b>Updated Event,</b> <?php echo e($activities['key']); ?> to <?php echo e($activities['new_value']); ?> for <b><?php echo e($activities['client']); ?>'s</b> <?php echo e($activities['event_type']); ?></p>
                                                <?php endif; ?>
                                                <p><b>Venue - </b> <?php echo e($activities['location']); ?></p>
                                                <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                                    <p><a href="<?php echo e(url('event/'.$activities['id'].'/show')); ?>" class="text-info">View</a></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="bnq-item">
                                            <div class="bnq-left"> <img class="img-circle" alt="user" src="<?php echo e(($activities['image'] != '') ? url('uploads/avatar/'.$activities['image']) : url('uploads/avatar/user.png')); ?>"> </div>
                                            <div class="bnq-right">
                                                <div><a class="name-info new_lead" href="<?php echo e(url('staff/'.$activities['user_id'].'/show')); ?>"><?php echo e($activities['user']); ?></a> <span class="bnq-date"> <?php echo e($activities['time_diff']); ?></span></div>
                                                <?php if($activities['status'] == 'created'): ?>
                                                    <p>Created new lead for <b><?php echo e($activities['client']); ?></b> <?php echo e($activities['event_type']); ?></p>
                                                <?php else: ?>
                                                    <p><b>Updated Lead,</b> <?php echo e($activities['key']); ?> to <?php echo e($activities['new_value']); ?> for <b><?php echo e($activities['client']); ?>'s</b> <?php echo e($activities['event_type']); ?></p>
                                                <?php endif; ?>
                                                <?php if($activities['priority'] == 'Open'): ?>
                                                    <p>
                                                        <a href="#" class="text-info low">Open</a>
                                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                            <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                                        <?php endif; ?>
                                                    </p>
                                                <?php elseif($activities['priority'] == 'Approached'): ?>
                                                    <p>
                                                        <a href="#" class="text-info high">Approached</a>
                                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                            <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                                        <?php endif; ?>
                                                    </p>
                                                <?php elseif($activities['priority'] == 'Converted'): ?>
                                                    <p>
                                                        <a href="#" class="text-info low">Converted</a>
                                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                            <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                                        <?php endif; ?>
                                                    </p>
                                                <?php else: ?>
                                                    <p>
                                                        <a href="#" class="text-info v_high">Do Not Contact</a>
                                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                            <a href="<?php echo e(url('lead/'.$activities['id'].'/show')); ?>" class="text-info">View</a>
                                                        <?php endif; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 top-right-block">

            <div class="row">

            <div class="col-lg-6">

                <div class="cnts evnt">
                    <div class="row">
                        <div class="col-md-12"><h4><?php echo e(trans('dashboard.new')); ?> <?php echo e(trans('dashboard.leads')); ?></h4></div>
                    </div>
                    <div class="panel-body task-body1 new_lead">
                        <div class="table-responsive">
                            <table class="table" style="margin: 0">
                                <thead>
                                <tr>
                                    <th>Creation Date</th>
                                    <th>Client Name</th>
                                    <th>Agent Name</th>
                                    <th>Event</th>
                                    <th>Priority</th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $today_leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row">
                                        <td><?php echo e(date((Settings::get('date_format') != '' ? Settings::get('date_format') : 'D d,M Y'),strtotime($leads->created_at))); ?></td>
                                        <td><?php echo e($leads->client_name); ?></td>
                                        <td><?php echo e($leads->salesPerson->first_name); ?> <?php echo e($leads->salesPerson->last_name); ?></td>
                                        <td><?php echo e($leads->eventTypeTrashed->name); ?></td>
                                        <td><?php echo e($leads->priority); ?></td>
                                        <td>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url("lead/".$leads->id."/edit")); ?>" title="Edit"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                                            <?php endif; ?>
                                            <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                                <a href="<?php echo e(url("lead/".$leads->id."/show")); ?>" class=""><i class="fa fa-fw fa-eye text-primary"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>


                <div class="col-lg-6">

                    <div class="cnts evnt">
                        <div class="row">
                            <div class="col-md-12">

                                <a><h4>
                                        <i class="livicon" data-name="inbox" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                        <?php echo e(trans('dashboard.upcomingEventsOfAWeek')); ?>

                                    </h4></a>

                            </div>
                        </div>
                        <div class="panel-body task-body1">

                            <div class="table-responsive">
                                <table class="table" style="margin: 0">
                                    <thead>
                                    <tr>
                                        <th>Event Date</th>
                                        <th>Client Name</th>
                                        <th>Event name</th>
                                        <th>Location</th>
                                        <th>Owner</th>
                                        <th> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $today_event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row">
                                            <td><?php echo e(date((Settings::get('date_format') != '' ? Settings::get('date_format') : 'D d,M Y'),strtotime($event->booking->from_date))); ?></td>
                                            <td><?php echo e($event->booking->booking_name); ?></td>
                                            <?php
                                                $temp = explode(' ', ucwords($event->contactus->event_type_trashed->name));
                                                $result = '';
                                                foreach($temp as $t)
                                                    $result .= $t[0];
                                                $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($event->booking->from_date))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$event->start_time)));
                                            ?>
                                            <td><?php echo e($final_name); ?></td>
                                            
                                            <td><?php echo e($event->booking->location->name); ?></td>
                                            <td><?php echo e($event->owner_trashed->first_name .' '. $event->owner_trashed->last_name); ?></td>
                                            <td>
                                                <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                                    <a href="<?php echo e(url("event/".$event->id."/edit")); ?>" title="Edit"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                                                <?php endif; ?>
                                                <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                                    <a href="<?php echo e(url("event/".$event->id."/show")); ?>" class=""><i class="fa fa-fw fa-eye text-primary"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        
            
                
                    
                        
                            
                                
                            
                        
                        
                    
                
            
        

        <div class="col-sm-12 col-md-6 col-lg-6 bottom-block">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cnts">
                        <div class="row">
                            <div class="col-md-12">
                                <a><h4>World Top Events </h4></a>
                            </div>
                        </div>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 bottom-block">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cnts">
                        <div class="row">
                            <div class="col-md-12">
                                <a><h4><span id="countno4"></span> <?php echo e(trans('left_menu.companies')); ?></h4></a>
                            </div>
                        </div>
                        <div class="world"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.v3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/d3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/c3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/countUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
    <script>
        var activity_log;
        $(function() {
            clearInterval(activity_log);
            activity_log = setInterval(function(){
                getActivityLog()
            },60 * 1000);
        });

        function getActivityLog(){
            $.ajax({
                url : '/getActivityLog',
                type : 'get',
                dataType : 'json',
                success : function (data){
                    var html = '';
                    var host = '<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") .'://'. $_SERVER['HTTP_HOST'] ;?>';
                    $.each(data,function(key,value){
                       if(value.type == 'event'){
                           html += '<div class="bnq-item create_event">';
                           html += '<div class="bnq-left"> <img class="img-circle" alt="user" src="'+((value.image != '' && value.image != null) ? host + '/uploads/avatar/'+value.image : host + '/uploads/avatar/user.png')+'"></div>';
                           html += '<div class="bnq-right">';
                           html += '<div><a class="name-info new_lead" href="'+host +'/staff/'+value.user_id+'/show">'+value.user+'</a> <span class="bnq-date"> '+value.time_diff+'</span></div>';
                           if(value.status == 'created'){
                               html += '<p>Create Event for <b>'+value.client+'</b> '+value.event_type+'</p>';
                           }else{
                                html += '<p><b>Update Event,</b> '+value.key+' to '+ value.new_value+' for <b>'+value.client+'\'s</b> '+value.event_type+'</p>';
                           }
                           html += '<p><b>Venue - </b> '+value.location+'</p>';
                           html += '<p><a href="'+host+'/event/'+value.id+'/show" class="text-info">View</a></p>';
                           html += '</div></div>';
                       }else{
                            html += '<div class="bnq-item">';
                            html += '<div class="bnq-left"> <img class="img-circle" alt="user" src="'+((value.image != '' && value.image != null) ? host + '/uploads/avatar/'+value.image : host + '/uploads/avatar/user.png')+'"></div>';
                            html += '<div class="bnq-right">';
                            html += '<div><a class="name-info new_lead" href="'+host +'/staff/'+value.user_id+'/show">'+value.user+'</a> <span class="bnq-date"> '+value.time_diff+'</span></div>';
                            if(value.status == 'created'){
                                html += '<p>Create new lead for <b>'+value.client+'</b> '+value.event_type+'</p>';
                            }else{
                                html += '<p><b>Update Lead,</b> '+value.key+' to '+ value.new_value +' for <b>'+value.client+'\'s</b> '+value.event_type+'</p>';
                            }
                            if(value.priority == 'Open'){
                                html += '<p><a href="#" class="text-info low">Open</a><a href="'+host +'/lead/'+value.id+'/show" class="text-info">View</a></p>';
                            }else if(value.priority == 'Approached'){
                                html += '<a href="#" class="text-info high">Approached</a><a href="'+host +'/lead/'+value.id+'/show" class="text-info">View</a></p>';
                            }else if(value.priority == 'Converted') {
                                html += '<a href="#" class="text-info low">Converted</a><a href="'+host +'/lead/'+value.id+'/show" class="text-info">View</a></p>';
                            }else{
                                html += '<a href="#" class="text-info v_high">Do Not Contact</a><a href="'+host +'/lead/'+value.id+'/show" class="text-info">View</a></p>';
                            }
                            html += '</div></div>';
                       }
                    });
                    $('.steamline').html(html);
                }
            });
        }
        function formatInteger(d) {
            return ((d % 1 === 0) ? d : '');
        }

        /*c3 line chart*/
        $(document).ready(function(){

            var data_opp_lead = [
                ['Event', 'Leads'],
                    <?php $__currentLoopData = $event_leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item['event']); ?>, <?php echo e($item['leads']); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

//c3 customisation
            var chart_opp_lead = c3.generate({
                bindto: '#chart_opp_lead',
                data: {
                    rows: data_opp_lead
//                    type: 'area-spline'
                },
                color: {
                    pattern: ['#fcc200','#906cd3',]
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
                            format: function (d) {
                                return formatInteger(d);
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
                },
                size: {
                    height: 320
                }
            });

            function formatMonth(d) {

                <?php $__currentLoopData = $event_leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if ('<?php echo e($id); ?>' == d) {
                    return '<?php echo e($item['month']); ?>' + ' ' + '<?php echo e($item['year']); ?>'
                }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            setTimeout(function () {
                chart_opp_lead.resize();
            }, 2000);

            setTimeout(function () {
                chart_opp_lead.resize();
            }, 4000);

            setTimeout(function () {
                chart_opp_lead.resize();
            }, 6000);
            $("[data-toggle='offcanvas']").click(function (e) {
                chart_opp_lead.resize();
            });
            /*c3 line chart end*/

            /*c3 pie chart*/
            var chart = c3.generate({
                bindto: '#sales',
                data: {
                    columns: [
                        ['Decorator', <?php echo e($decorator); ?>],
                        ['Photographer', <?php echo e($photo); ?>],
                        ['Entertainer', <?php echo e($entertainer); ?>],
                        ['Transportation', <?php echo e($transport); ?>],
                        ['Miscellaneous', <?php echo e($miscellaneous); ?>],
                        ['Caterer', <?php echo e($caterer); ?>]
                    ],
                    type: 'donut',
                    colors: {
                        'Decorator': '#5797fc',
                        'Photographer': '#7e6fff',
                        'Entertainer': '#ef4a31',
                        'Transportation': '#ffcc29',
                        'miscellaneous': '#f37070',
                        'Caterer': '#4ecc48'
                    },
                    labels: true
                },
                donut: {
                    width: 30,
                    title: "",
                    label: {
                        show: false
                    }
                }
            });
            $(".sidebar-toggle").on("click", function () {
                setTimeout(function () {
                    chart.resize();
                }, 200)
            });
            /*c3 pie chart end*/
            // c3 chart end


            /*dashboard countup*/
            var useOnComplete = false,
                useEasing = false,
                useGrouping = false,
                options = {
                    useEasing: useEasing, // toggle easing
                    useGrouping: useGrouping, // 1,000,000 vs 1000000
                    separator: ',', // character to use as a separator
                    decimal: '.' // character to use as a decimal
                };

                    
                    
            var demo = new CountUp("countno2", 0, "<?php echo e($products); ?>", 0, 3, options);
            demo.start();
            var demo = new CountUp("countno3", 0, "<?php echo e($event_count); ?>", 0, 3, options);
            demo.start();
            var demo = new CountUp("countno4", 0, "<?php echo e($customers); ?>", 0, 3, options);
            demo.start();
            var demo = new CountUp("countno5", 0, "<?php echo e($saleOrders); ?>", 0, 3, options);
            demo.start();

            /*countup end*/

            var world = $('.world').vectorMap(
                {
                    map: 'world_mill_en',
                    markers: [
                            <?php $__currentLoopData = $customers_world; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            latLng: [<?php echo e($item['latitude']); ?>, <?php echo e($item['longitude']); ?>], name: '<?php echo e($item['city']); ?>'
                        },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    normalizeFunction: 'polynomial',
                    backgroundColor: 'transparent',
                    regionsSelectable: true,
                    markersSelectable: true,
                    regionStyle: {
                        initial: {
                            fill: 'rgba(120,130,140,0.2)'
                        },
                        hover: {
                            fill: '#2283Bf',
                            stroke: '#fff'
                        }
                    },
                    markerStyle: {
                        initial: {
                            fill: '#9b7ed0',
                            stroke: '#fff',
                            r: 10
                        },
                        hover: {
                            fill: '#0cc2aa',
                            stroke: '#fff',
                            r: 15
                        }
                    }
                }
            );
            $(".sidebar-toggle").on("click", function () {
                setTimeout(function () {
                    world.resize();
                }, 200)
            });
            $('.task-body1').slimscroll({
                height: '100',
                size: '5px',
                opacity: 0.2
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            var data_lead = [
                ['Leads'],
                    <?php $__currentLoopData = $leads_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item['lead']); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

            var chart_lead = c3.generate({
                bindto: '#leadChart',
                size: {
                    height: 60
                },
                data: {
                    rows: data_lead,
                    /*type: 'area-spline'*/
                },
                axis: {
                    x: {show:false},
                    y: {show:false}
                },
                color: {
                    pattern: ['#9573cc']
                },
                legend: {
                    show: false,
                    position: 'bottom'
                },
                padding: {
                    top: 10
                }
            });

            function formatMonth1(d) {

                <?php $__currentLoopData = $leads_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if ('<?php echo e($id); ?>' == d) {
                    return '<?php echo e($item['month']); ?>' + ' ' + '<?php echo e($item['year']); ?>'
                }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            setTimeout(function () {
                chart_lead.resize();
            }, 2000);

            setTimeout(function () {
                chart_lead.resize();
            }, 4000);

            setTimeout(function () {
                chart_lead.resize();
            }, 6000);
            $("[data-toggle='offcanvas']").click(function (e) {
                chart_lead.resize();
            });


            var data_event = [
                ['Events'],
                    <?php $__currentLoopData = $event_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item['event']); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

            var chart_event = c3.generate({
                bindto: '#eventChart',
                size: {
                    height: 60
                },
                data: {
                    rows: data_event,
                    type: 'bar'
                },
                color: {
                    pattern: ['#0ab39c']
                },
                bar: {
                    width: {ratio: 1},
                },

                axis: {
                    x: {show:false},
                    y: {show:false}
                },

                legend: {
                    show: false,
                    position: 'bottom'
                },

                padding: {
                    top: 10
                }
            });

            function formatMonth2(d) {

                <?php $__currentLoopData = $event_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


            var data_saleOrder = [
                ['Sales Orders'],
                    <?php $__currentLoopData = $sale_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item['sale']); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

            var chart_saleOrder = c3.generate({
                bindto: '#salesOrderChart',
                size: {
                    height: 60
                },
                data: {
                    rows: data_saleOrder,
                    /*type: 'area-spline'*/
                },
                color: {
                    pattern: ['#FF7676']
                },

                axis: {
                    x: {show:false},
                    y: {show:false}
                },

                legend: {
                    show: false,
                    position: 'bottom'
                },

                padding: {
                    top: 10
                }
            });

            function formatMonth2(d) {

                <?php $__currentLoopData = $sale_chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if ('<?php echo e($id); ?>' == d) {
                    return '<?php echo e($item['month']); ?>' + ' ' + '<?php echo e($item['year']); ?>'
                }
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }

            setTimeout(function () {
                chart_saleOrder.resize();
            }, 2000);

            setTimeout(function () {
                chart_saleOrder.resize();
            }, 4000);

            setTimeout(function () {
                chart_saleOrder.resize();
            }, 6000);
            $("[data-toggle='offcanvas']").click(function (e) {
                chart_saleOrder.resize();
            });
        })
    </script>

    <script>

        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 3,
                center: {lat: -28.024, lng: 140.887}
            });

            // Create an array of alphabetical characters used to label the markers.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // Add some markers to the map.
            // Note: The code uses the JavaScript Array.prototype.map() method to
            // create an array of markers based on a given "locations" array.
            // The map() method here has nothing to do with the Google Maps API.
            var markers = locations.map(function(location, i) {
                return new google.maps.Marker({
                    position: location,
                    label: labels[i % labels.length]
                });
            });

            // Add a marker clusterer to manage the markers.
            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }
        var locations = [
            {lat: -31.563910, lng: 147.154312},
            {lat: -33.718234, lng: 150.363181},
            {lat: -33.727111, lng: 150.371124},
            {lat: -33.848588, lng: 151.209834},
            {lat: -33.851702, lng: 151.216968},
            {lat: -34.671264, lng: 150.863657},
            {lat: -35.304724, lng: 148.662905},
            {lat: -36.817685, lng: 175.699196},
            {lat: -36.828611, lng: 175.790222},
            {lat: -37.750000, lng: 145.116667},
            {lat: -37.759859, lng: 145.128708},
            {lat: -37.765015, lng: 145.133858},
            {lat: -37.770104, lng: 145.143299},
            {lat: -37.773700, lng: 145.145187},
            {lat: -37.774785, lng: 145.137978},
            {lat: -37.819616, lng: 144.968119},
            {lat: -38.330766, lng: 144.695692},
            {lat: -39.927193, lng: 175.053218},
            {lat: -41.330162, lng: 174.865694},
            {lat: -42.734358, lng: 147.439506},
            {lat: -42.734358, lng: 147.501315},
            {lat: -42.735258, lng: 147.438000},
            {lat: -43.999792, lng: 170.463352}
        ]
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe6XaHo_OzJvXW2v8bMJUsP4F7DXAUJ5M&callback=initMap"
            type="text/javascript"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>