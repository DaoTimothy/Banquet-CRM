<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="page-header clearfix">
        <?php if($user_data->hasAccess(['event.write']) || $user_data->inRole('admin')): ?>
            <div class="pull-right">
                
                    
                <a href="<?php echo e($type.'/create'); ?>" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> <?php echo e(trans('New Event')); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="kanban_box">
            <div id="div1" class="karnben_cardbox kan_prospect_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Prospect">
                <div class="kanben_card_title">
                    <h3>Prospect</h3>
                </div>
                <?php if(isset($event['PROSPECT'])): ?>
                    <?php $__currentLoopData = $event['PROSPECT']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Prospect">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($events['contactus']['event_type_trashed']['name']) == 'anniversary'): ?>
                                    <span class="anni_status">Anniversary</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'marriage'): ?>
                                    <span class="marraaige_status">Marriage</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'conference'): ?>
                                    <span class="conf_status">Conference</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'meeting'): ?>
                                    <span class="metting_status">Meeting</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'birthday'): ?>
                                    <span class="birthday_status">Birthday</span>
                                <?php else: ?>
                                    <span class="corpo_status"><?php echo e($events['contactus']['event_type_trashed']['name']); ?></span>
                                <?php endif; ?>

                                <p>Client Name : <?php echo e($events['booking']['booking_name']); ?></p>
                                <?php
                                    $temp = explode(' ', ucwords($events['contactus']['event_type_trashed']['name']));
                                    $result = '';
                                    foreach($temp as $t)
                                        $result .= $t[0];
                                    $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($events['booking']['from_date']))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$events['start_time'])));
                                ?>
                                <p>Event name : <?php echo e($final_name); ?></p>
                                <p>Email : <?php echo e(($events['booking']['client_email'] != NULL) ? $events['booking']['client_email'] : $events['lead']['email']); ?></p>
                                <p>Mobile : <?php echo e(($events['booking']['client_phone'] != NULL) ? $events['booking']['client_phone'] : $events['lead']['mobile']); ?></p>
                                <P>Start Date : <?php echo e($events['lead']['event_date']); ?></P>
                                <div class="remaining_box">
                                    <p aria-hidden="true" data-toggle="collapse" data-target="#remaining<?php echo e($events['id']); ?>">Remaining... <i class="fa fa-caret-down"></i></p>
                                    <div id="remaining<?php echo e($events['id']); ?>" class="collapse remaining_select">
                                        <ul>
                                            <?php $__currentLoopData = $events['remaning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('event/'.$events['id'].'/edit/?dd='.$remaining[1])); ?>"><?php echo e($remaining[0]); ?> <i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>

        <div class="kanban_box">
            <div id="div2" class="karnben_cardbox kan_tentative_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Tentative">
                <div class="kanben_card_title">
                    <h3>Tentative</h3>
                </div>
                <?php if(isset($event['TENTATIVE'])): ?>
                    <?php $__currentLoopData = $event['TENTATIVE']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Tentative">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($events['contactus']['event_type_trashed']['name']) == 'anniversary'): ?>
                                    <span class="anni_status">Anniversary</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'marriage'): ?>
                                    <span class="marraaige_status">Marriage</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'conference'): ?>
                                    <span class="conf_status">Conference</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'meeting'): ?>
                                    <span class="metting_status">Meeting</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'birthday'): ?>
                                    <span class="birthday_status">Birthday</span>
                                <?php else: ?>
                                    <span class="corpo_status"><?php echo e($events['contactus']['event_type_trashed']['name']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($events['booking']['booking_name']); ?></p>
                                <?php
                                    $temp = explode(' ', ucwords($events['contactus']['event_type_trashed']['name']));
                                    $result = '';
                                    foreach($temp as $t)
                                        $result .= $t[0];
                                    $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($events['booking']['from_date']))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$events['start_time'])));
                                ?>
                                <p>Event name : <?php echo e($final_name); ?></p>
                                <p>Email : <?php echo e(($events['booking']['client_email'] != NULL) ? $events['booking']['client_email'] : $events['lead']['email']); ?></p>
                                <p>Mobile : <?php echo e(($events['booking']['client_phone'] != NULL) ? $events['booking']['client_phone'] : $events['lead']['mobile']); ?></p>
                                <P>Start Date : <?php echo e($events['lead']['event_date']); ?></P>
                                <div class="remaining_box">
                                    <p aria-hidden="true" data-toggle="collapse" data-target="#remaining<?php echo e($events['id']); ?>">Remaining... <i class="fa fa-caret-down"></i></p>
                                    <div id="remaining<?php echo e($events['id']); ?>" class="collapse remaining_select">
                                        <ul>
                                            <?php $__currentLoopData = $events['remaning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('event/'.$events['id'].'/edit/?dd='.$remaining[1])); ?>"><?php echo e($remaining[0]); ?> <i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>

        <div class="kanban_box">
            <div id="div3" class="karnben_cardbox kan_definite_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Definite">
                <div class="kanben_card_title">
                    <h3>Definite</h3>
                </div>
                <?php if(isset($event['DEFINITE'])): ?>
                    <?php $__currentLoopData = $event['DEFINITE']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Definite">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($events['contactus']['event_type_trashed']['name']) == 'anniversary'): ?>
                                    <span class="anni_status">Anniversary</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'marriage'): ?>
                                    <span class="marraaige_status">Marriage</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'conference'): ?>
                                    <span class="conf_status">Conference</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'meeting'): ?>
                                    <span class="metting_status">Meeting</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'birthday'): ?>
                                    <span class="birthday_status">Birthday</span>
                                <?php else: ?>
                                    <span class="corpo_status"><?php echo e($events['contactus']['event_type_trashed']['name']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($events['booking']['booking_name']); ?></p>
                                <?php
                                    $temp = explode(' ', ucwords($events['contactus']['event_type_trashed']['name']));
                                    $result = '';
                                    foreach($temp as $t)
                                        $result .= $t[0];
                                    $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($events['booking']['from_date']))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$events['start_time'])));
                                ?>
                                <p>Event name : <?php echo e($final_name); ?></p>
                                <p>Email : <?php echo e(($events['booking']['client_email'] != NULL) ? $events['booking']['client_email'] : $events['lead']['email']); ?></p>
                                <p>Mobile : <?php echo e(($events['booking']['client_phone'] != NULL) ? $events['booking']['client_phone'] : $events['lead']['mobile']); ?></p>
                                <P>Start Date : <?php echo e($events['lead']['event_date']); ?></P>
                                <div class="remaining_box">
                                    <p aria-hidden="true" data-toggle="collapse" data-target="#remaining<?php echo e($events['id']); ?>">Remaining... <i class="fa fa-caret-down"></i></p>
                                    <div id="remaining<?php echo e($events['id']); ?>" class="collapse remaining_select">
                                        <ul>
                                            <?php $__currentLoopData = $events['remaning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('event/'.$events['id'].'/edit/?dd='.$remaining[1])); ?>"><?php echo e($remaining[0]); ?> <i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="kanban_box">
            <div id="div4"  class="karnben_cardbox kan_close_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Close">
                <div class="kanben_card_title">
                    <h3>Close</h3>
                </div>
                <?php if(isset($event['CLOSE'])): ?>
                    <?php $__currentLoopData = $event['CLOSE']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Close">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($events['contactus']['event_type_trashed']['name']) == 'anniversary'): ?>
                                    <span class="anni_status">Anniversary</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'marriage'): ?>
                                    <span class="marraaige_status">Marriage</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'conference'): ?>
                                    <span class="conf_status">Conference</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'meeting'): ?>
                                    <span class="metting_status">Meeting</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'birthday'): ?>
                                    <span class="birthday_status">Birthday</span>
                                <?php else: ?>
                                    <span class="corpo_status"><?php echo e($events['contactus']['event_type_trashed']['name']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($events['booking']['booking_name']); ?></p>
                                <?php
                                    $temp = explode(' ', ucwords($events['contactus']['event_type_trashed']['name']));
                                    $result = '';
                                    foreach($temp as $t)
                                        $result .= $t[0];
                                    $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($events['booking']['from_date']))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$events['start_time'])));
                                ?>
                                <p>Event name : <?php echo e($final_name); ?></p>
                                <p>Email : <?php echo e(($events['booking']['client_email'] != NULL) ? $events['booking']['client_email'] : $events['lead']['email']); ?></p>
                                <p>Mobile : <?php echo e(($events['booking']['client_phone'] != NULL) ? $events['booking']['client_phone'] : $events['lead']['mobile']); ?></p>
                                <P>Start Date : <?php echo e($events['lead']['event_date']); ?></P>
                                <div class="remaining_box">
                                    <p aria-hidden="true" data-toggle="collapse" data-target="#remaining<?php echo e($events['id']); ?>">Remaining... <i class="fa fa-caret-down"></i></p>
                                    <div id="remaining<?php echo e($events['id']); ?>" class="collapse remaining_select">
                                        <ul>
                                            <?php $__currentLoopData = $events['remaning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('event/'.$events['id'].'/edit/?dd='.$remaining[1])); ?>"><?php echo e($remaining[0]); ?> <i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="kanban_box">
            <div id="div5" class="karnben_cardbox kan_lost_card" ondrop="drop(event,this)" ondragover="allowDrop(event)">
                <input class="to" type="hidden" name="status" value="Lost">
                <div class="kanben_card_title">
                    <h3>Lost</h3>
                </div>
                <?php if(isset($event['LOST'])): ?>
                    <?php $__currentLoopData = $event['LOST']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox" draggable="true" ondragstart="drag(event)">
                        <?php else: ?>
                            <div id="drag<?php echo e($events['id']); ?>" class="kanban_dragbox">
                        <?php endif; ?>
                            <div class="kcard_details">
                                <input class="from" type="hidden" name="status" value="Lost">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if(Sentinel::getUser()->hasAccess(['event.write']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/edit')); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.read']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/show')); ?>"><i class="fa fa-fw fa-eye"></i> View</a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::getUser()->hasAccess(['event.delete']) || Sentinel::inRole('admin')): ?>
                                            <li><a href="<?php echo e(url('event/'.$events['id'].'/delete')); ?>"><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if(strtolower($events['contactus']['event_type_trashed']['name']) == 'anniversary'): ?>
                                    <span class="anni_status">Anniversary</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'marriage'): ?>
                                    <span class="marraaige_status">Marriage</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'conference'): ?>
                                    <span class="conf_status">Conference</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'meeting'): ?>
                                    <span class="metting_status">Meeting</span>
                                <?php elseif(strtolower($events['contactus']['event_type_trashed']['name']) == 'birthday'): ?>
                                    <span class="birthday_status">Birthday</span>
                                <?php else: ?>
                                    <span class="corpo_status"><?php echo e($events['contactus']['event_type_trashed']['name']); ?></span>
                                <?php endif; ?>
                                <p>Client Name : <?php echo e($events['booking']['booking_name']); ?></p>
                                <?php
                                    $temp = explode(' ', ucwords($events['contactus']['event_type_trashed']['name']));
                                    $result = '';
                                    foreach($temp as $t)
                                        $result .= $t[0];
                                    $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($events['booking']['from_date']))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$events['start_time'])));
                                ?>
                                <p>Event name : <?php echo e($final_name); ?></p>
                                <p>Email : <?php echo e(($events['booking']['client_email'] != NULL) ? $events['booking']['client_email'] : $events['lead']['email']); ?></p>
                                <p>Mobile : <?php echo e(($events['booking']['client_phone'] != NULL) ? $events['booking']['client_phone'] : $events['lead']['mobile']); ?></p>
                                <P>Start Date : <?php echo e($events['lead']['event_date']); ?></P>
                                <div class="remaining_box">
                                    <p aria-hidden="true" data-toggle="collapse" data-target="#remaining<?php echo e($events['id']); ?>">Remaining... <i class="fa fa-caret-down"></i></p>
                                    <div id="remaining<?php echo e($events['id']); ?>" class="collapse remaining_select">
                                        <ul>
                                            <?php $__currentLoopData = $events['remaning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('event/'.$events['id'].'/edit/?dd='.$remaining[1])); ?>"><?php echo e($remaining[0]); ?> <i class="fa fa-fw fa-pencil"></i></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="nav-icon"></span>
            <h4 class="panel-title">
                <i class="material-icons">star</i>
                <?php echo e($title2); ?>

            </h4>
            <span class="pull-right">
                <i class="fa fa-fw fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('Client Name')); ?></th>
                        <th><?php echo e(trans('Event Name')); ?></th>
                        <th><?php echo e(trans('Lead Owner')); ?></th>
                        <th><?php echo e(trans('Date')); ?></th>
                        <th><?php echo e(trans('Time')); ?></th>
                        
                        <th><?php echo e(trans('Venue')); ?></th>
                        <th><?php echo e(trans('Contact')); ?></th>
                        <th><?php echo e(trans('Status')); ?></th>
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
                url : host + '/event/'+id+'/editStatus',
                type : 'post',
                data : {status : status , _token : '<?php echo e(csrf_token()); ?>'},
                dataType : 'json',
                success : function(data){
                    toastr.options = {
//                        timeOut: 0,
//                        extendedTimeOut: 0,
//                        tapToDismiss: false,
                        positionClass : "toast-bottom-right"
                    };
                    toastr["success"]("Status Changed To " + status);
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