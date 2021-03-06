<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['leads.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('lead.new')); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div id="div1" class="karnben_cardbox kan_prospect_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Open">
                <div class="kanben_card_title">
                    <h3>Open</h3>
                </div>
                <?php if(isset($lead['Open'])): ?>
                    <?php $__currentLoopData = $lead['Open']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Open">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($leads['priority']) == 'open'): ?>
                                    <span class="anni_status">Open</span>
                                <?php elseif(strtolower($leads['priority']) == 'approached'): ?>
                                    <span class="marraaige_status">Approached</span>
                                <?php elseif(strtolower($leads['priority']) == 'converted'): ?>
                                    <span class="conf_status">Converted</span>
                                <?php else: ?>
                                    <span class="birthday_status"><?php echo e($leads['priority']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($leads['client_name']); ?></p>
                                <p>Lead Owner : <?php echo e($leads['sales_person']['first_name']); ?>  <?php echo e($leads['sales_person']['last_name']); ?></p>
                                <p>Email : <?php echo e($leads['email']); ?></p>
                                <p>Mobile : <?php echo e($leads['mobile']); ?></p>
                                <P>Start Date : <?php echo e($leads['event_date']); ?></P>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div id="div2" class="karnben_cardbox kan_tentative_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Approached">
                <div class="kanben_card_title">
                    <h3>Approached</h3>
                </div>
                <?php if(isset($lead['Approached'])): ?>
                    <?php $__currentLoopData = $lead['Approached']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Approached">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($leads['priority']) == 'open'): ?>
                                    <span class="anni_status">Open</span>
                                <?php elseif(strtolower($leads['priority']) == 'approached'): ?>
                                    <span class="marraaige_status">Approached</span>
                                <?php elseif(strtolower($leads['priority']) == 'converted'): ?>
                                    <span class="conf_status">Converted</span>
                                <?php else: ?>
                                    <span class="birthday_status"><?php echo e($leads['priority']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($leads['client_name']); ?></p>
                                <p>Lead Owner : <?php echo e($leads['sales_person']['first_name']); ?>  <?php echo e($leads['sales_person']['last_name']); ?></p>
                                <p>Email : <?php echo e($leads['email']); ?></p>
                                <p>Mobile : <?php echo e($leads['mobile']); ?></p>
                                <P>Start Date : <?php echo e($leads['event_date']); ?></P>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div id="div3" class="karnben_cardbox kan_definite_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Converted">
                <div class="kanben_card_title">
                    <h3>Converted</h3>
                </div>
                <?php if(isset($lead['Converted'])): ?>
                    <?php $__currentLoopData = $lead['Converted']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox">
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Converted">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        
                                            
                                        
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($leads['priority']) == 'open'): ?>
                                    <span class="anni_status">Open</span>
                                <?php elseif(strtolower($leads['priority']) == 'approached'): ?>
                                    <span class="marraaige_status">Approached</span>
                                <?php elseif(strtolower($leads['priority']) == 'converted'): ?>
                                    <span class="conf_status">Converted</span>
                                <?php else: ?>
                                    <span class="birthday_status"><?php echo e($leads['priority']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($leads['client_name']); ?></p>
                                <p>Lead Owner : <?php echo e($leads['sales_person']['first_name']); ?>  <?php echo e($leads['sales_person']['last_name']); ?></p>
                                <p>Email : <?php echo e($leads['email']); ?></p>
                                <p>Mobile : <?php echo e($leads['mobile']); ?></p>
                                <P>Start Date : <?php echo e($leads['event_date']); ?></P>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div id="div4"  class="karnben_cardbox kan_close_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Do Not Contact">
                <div class="kanben_card_title">
                    <h3>Do Not Contact</h3>
                </div>
                <?php if(isset($lead['Do Not Contact'])): ?>
                    <?php $__currentLoopData = $lead['Do Not Contact']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($leads['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Do Not Contact">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['leads.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('lead/'.$leads['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($leads['priority']) == 'open'): ?>
                                    <span class="anni_status">Open</span>
                                <?php elseif(strtolower($leads['priority']) == 'approached'): ?>
                                    <span class="marraaige_status">Approached</span>
                                <?php elseif(strtolower($leads['priority']) == 'converted'): ?>
                                    <span class="conf_status">Converted</span>
                                <?php else: ?>
                                    <span class="birthday_status"><?php echo e($leads['priority']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($leads['client_name']); ?></p>
                                <p>Lead Owner : <?php echo e($leads['sales_person']['first_name']); ?>  <?php echo e($leads['sales_person']['last_name']); ?></p>
                                <p>Email : <?php echo e($leads['email']); ?></p>
                                <p>Mobile : <?php echo e($leads['mobile']); ?></p>
                                <P>Start Date : <?php echo e($leads['event_date']); ?></P>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default cnts">
        <div class="panel-heading">
            <h4 class="panel-title">
                <i class="material-icons">blur_on</i>
                <?php echo e($title); ?>

            </h4>
            <span class="pull-right collapse-btn">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('lead.creation_date')); ?></th>
                        <th><?php echo e(trans('lead.company_name')); ?></th>
                        
                        <th><?php echo e(trans('lead.client_name')); ?></th>
                        <th><?php echo e(trans('event.lead_owner')); ?></th>
                        
                        <th><?php echo e(trans('lead.email')); ?></th>
                        <th><?php echo e(trans('lead.mobile')); ?></th>
                        <th><?php echo e(trans('event.start_date')); ?></th>
                        <th><?php echo e(trans('lead.priority')); ?></th>
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
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            ev.dataTransfer.setData("status", $('#' + ev.target.id +' .from').val());
        }

        function drop(ev, el) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var to = $('#' +el.id + ' .to').val();
            if($('#' + data +' .from').val() != to){
                updateStatus(data.replace('drag',''),to);
            }
            $('#' + data +' .from').val(to);
            el.appendChild(document.getElementById(data));
        }

        function updateStatus(id,status){
            var host = '<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") .'://'. $_SERVER['HTTP_HOST'] ;?>';
            $.ajax({
                url : host + '/lead/'+id+'/editStatus',
                type : 'post',
                data : {status : status , _token : '<?php echo e(csrf_token()); ?>'},
                dataType : 'json',
                success : function(data){
                    if(status.toLowerCase() == 'converted'){
                        if(!data){
                            window.location.href = host + '/event/create/'+id;
                        }
                    }
                    toastr.options = {
//                        timeOut: 0,
//                        extendedTimeOut: 0,
//                        tapToDismiss: false,
                        positionClass : "toast-bottom-right"
                    };
                    toastr["success"]("Status Changed To " + status);
                    if(status.toLowerCase() == 'open'){
                        $('#drag'+id+ ' span').replaceWith('<span class="anni_status">Open</span>');
                    }else if(status.toLowerCase() == 'approached'){
                        $('#drag'+id+ ' span').replaceWith('<span class="marraaige_status">Approached</span>');
                    }else if(status.toLowerCase() == 'converted'){
                        $('#drag'+id+ ' span').replaceWith('<span class="conf_status">Converted</span>');
                    }else{
                        $('#drag'+id+ ' span').replaceWith('<span class="birthday_status">'+status+'</span>');
                    }
                    oTable.ajax.url('<?php echo url($type.'/data'); ?>');
                    oTable.ajax.reload();
                }
            });
        }
        //        function drop(ev) {
        //            ev.preventDefault();
        //            var data = ev.dataTransfer.getData("text");
        //            console.log(ev.dataTransfer.getData("status"));
        //            ev.target.appendChild(document.getElementById(data));
        //        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>