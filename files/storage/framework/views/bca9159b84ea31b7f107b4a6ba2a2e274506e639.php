<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo e(asset('css/editor.css')); ?>" type="text/css" rel="stylesheet"/>

</head>
<?php
$currency = \App\Models\Setting::where('setting_key','currency')->get();
$currency_position = \App\Models\Setting::where('setting_key','currency_position')->get();

$currency = (count($currency) > 0) ? ((trim(unserialize($currency->pluck("setting_value")->toArray()[0]) == 'USD')) ? '$' : '£') : '$';
$currency_position = (count($currency_position) > 0) ? unserialize($currency_position->pluck("setting_value")->toArray()[0]) : 'left';

?>
<div class="row">
<div class="col-md-8 col-sm-8">
<div class="event_show_section">
<div class="panel panel-primary">
    <div class="panel-body">


        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs Set-list">
                    <li class="active"><a data-toggle="pill" href="#home"><?php echo e(trans('event.details')); ?></a></li>
                    <?php if(Sentinel::getUser()->hasAccess(['docs.read']) || Sentinel::inRole('admin')): ?>
                        <li><a data-toggle="pill" href="#doc"><?php echo e(trans('event.docs')); ?></a></li>
                    <?php endif; ?>
                    <?php if(Sentinel::getUser()->hasAccess(['event_discussion.read']) || Sentinel::inRole('admin')): ?>
                        <li><a data-toggle="pill" href="#dis"><?php echo e(trans('event.discussion')); ?></a></li>
                    <?php endif; ?>
                    <?php if(Sentinel::getUser()->hasAccess(['event_task.read']) || Sentinel::inRole('admin')): ?>
                        <li><a data-toggle="pill" href="#task"><?php echo e(trans('event.task')); ?></a></li>
                    <?php endif; ?>
                    <?php if(Sentinel::getUser()->hasAccess(['event_note.read']) || Sentinel::inRole('admin')): ?>
                        <li><a data-toggle="pill" href="#note"><?php echo e(trans('event.note')); ?></a></li>
                    <?php endif; ?>
                    <?php if(Sentinel::getUser()->hasAccess(['event_payment.read']) || Sentinel::inRole('admin')): ?>
                        <li><a data-toggle="pill" href="#payment"><?php echo e(trans('event.payment')); ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="details">
                            <h3><b><?php echo e(trans('event.contact')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-6">
                                    <b><?php echo e(trans('event.email')); ?></b>
                                    <div class="contorls">
                                        <p><?php echo e($event->booking->client_email); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b><?php echo e(trans('event.contact')); ?></b>
                                    <div class="controls">
                                        <p><?php echo e($event->booking->client_phone); ?></p>
                                    </div>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.additionalInformation')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.expectedGuests')); ?></b>
                                    <p><?php echo e($event->contactus->expected_guest); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.owner')); ?></b>
                                    <p><?php echo e($event->owner_trashed->full_name); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.guaranteedGuests')); ?></b>
                                    <p><?php echo e($event->contactus->guarnteed_guest); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.leadSource')); ?></b>
                                    <p><?php echo e($event->leadSources->name); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.typeOfEvent')); ?></b>
                                    <p><?php echo e($event->contactus->event_type_trashed->name); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.manager')); ?></b>
                                    <p><?php echo e(implode(",",\App\Models\Managers::whereIn('id',explode(",",$event->contactus->manager))->get()->pluck("name")->toArray())); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.createdAt')); ?></b>
                                    <p><?php echo e(date('D, M d,Y h:i a',strtotime($event->created_at))); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.updatedAt')); ?></b>
                                    <p><?php echo e(($event->updated_at != NULL ? date('D, M d,Y h:i a',strtotime($event->updated_at)) : date('D, M d,Y h:i a',strtotime($event->created_at)))); ?></p>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.financial')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.foodBeverageMin')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->food_beverage_min != NULL) ? $event->financials->food_beverage_min : '0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->food_beverage_min != NULL) ? $event->financials->food_beverage_min : '0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.grandTotal')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->grand_total != NULL) ? $event->financials->grand_total : '0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->grand_total != NULL) ? $event->financials->grand_total : '0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.rentalFee')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->rental_fee != NULL) ? $event->financials->rental_fee :'0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->rental_fee != NULL) ? $event->financials->rental_fee :'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.amountDue')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->amount_due != NULL) ? $event->financials->amount_due :'0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->amount_due != NULL) ? $event->financials->amount_due :'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.depositAmounts')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->deposit_amount!= NULL) ? $event->financials->deposit_amount:'0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->deposit_amount!= NULL) ? $event->financials->deposit_amount:'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.pricePerPersons')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->price_per_persons!= NULL) ? $event->financials->price_per_persons:'0'); ?> </p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->price_per_persons!= NULL) ? $event->financials->price_per_persons:'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.actualAmount')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->financials && $event->financials->actual_amount!= NULL) ? $event->financials->actual_amount:'0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->financials && $event->financials->actual_amount!= NULL) ? $event->financials->actual_amount:'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.depositType')); ?></b>
                                    <p><?php echo e(($event->financials) ? (($event->financials->depositType) ? $event->financials->depositType->name :'No Type Selected'):'No Type Selected'); ?></p>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.depositPayment')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.depositDue')); ?></b>
                                    <p><?php echo e(($event->deposit && $event->deposit->deposit_due != NULL) ?  date('D d,Y',strtotime($event->deposit->deposit_due)) : 'No Due Date Selected'); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.2ndDepositDueDate')); ?></b>
                                    <p><?php echo e(($event->deposit && $event->deposit->sec_deposit_due != NULL) ? date('D d,Y',strtotime($event->deposit->sec_deposit_due)):'No Due Date Selected'); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.2ndDeposit')); ?></b>
                                    <?php if($currency_position == 'left'): ?>
                                        <p><?php echo e($currency); ?> <?php echo e(($event->deposit && $event->deposit->sec_deposit != NULL) ? $event->deposit->sec_deposit:'0'); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(($event->deposit && $event->deposit->sec_deposit != NULL) ? $event->deposit->sec_deposit:'0'); ?> <?php echo e($currency); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.balanceDueDate')); ?></b>
                                    <p><?php echo e(($event->deposit && $event->deposit->balance_due != NULL) ? date('D d,Y',strtotime($event->deposit->balance_due)):'No Due Date Selected'); ?></p>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.anyKids')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-6">
                                    <b><?php echo e(trans('event.under12Years')); ?></b>
                                    <p><?php echo e((($event->kids && $event->kids->under_12_years != NULL) ? $event->kids->under_12_years : 0)); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <b><?php echo e(trans('event.under5Years')); ?></b>
                                    <p><?php echo e((($event->kids && $event->kids->under_5_years != NULL) ? $event->kids->under_5_years : 0)); ?></p>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.eatingTimes')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.serviceTime')); ?></b>
                                    <p><?php echo e(($event->eating_times && $event->eating_times->service_time != NULL) ? $event->eating_times->service_time:'No Time Set'); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.canapes')); ?></b>
                                    <p><?php echo e(($event->eating_times && $event->eating_times->canapes != NULL) ? $event->eating_times->canapes:'Not Time Set'); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.morningSnacks')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->morning_snacks_time != NULL): ?>
                                        <?php $data = array($event->eating_times->morning_snacks_time, $event->eating_times->morning_snacks_time_end); ?>
                                        <p><?php echo e($data[0] .' TO ' .$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.morningTeaCoffee')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->morning_tea_time != NULL): ?>
                                        <?php $data = array($event->eating_times->morning_tea_time, $event->eating_times->morning_tea_time_end); ?>
                                        <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.lunch')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->lunch_time != NULL): ?>
                                        <?php $data = array($event->eating_times->lunch_time, $event->eating_times->lunch_time_end); ?>
                                        <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.afternoonTeaCoffee')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->evening_tea_time != NULL): ?>
                                        <?php $data = array($event->eating_times->evening_tea_time, $event->eating_times->evening_tea_time_end); ?>
                                        <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.eveningSnacks')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->evening_snacks_time != NULL): ?>
                                        <?php $data = array($event->eating_times->evening_snacks_time, $event->eating_times->evening_snacks_time_end); ?>
                                        <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <b><?php echo e(trans('event.dinner')); ?></b>
                                    <?php if(($event->eating_times) && $event->eating_times->dinner_time != NULL): ?>
                                        <?php $data = array($event->eating_times->dinner_time, $event->eating_times->dinner_time_end); ?>
                                        <p><?php echo e($data[0] .' TO '.$data[1]); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e(trans('event.noTimeSet')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <h3><b><?php echo e(trans('event.logistics')); ?></b></h3>
                            <div class="row form-panel-view">
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.timeOfDeparture')); ?></b>
                                    <p><?php echo e(($event->logistics && $event->logistics->time_of_departure != NULL) ? $event->logistics->time_of_departure:'No Time Set'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.vanChoice')); ?></b>
                                    <p><?php echo e(($event->logistics &&$event->logistics->van_choice != NULL) ? $event->logistics->van_choice:'No Vehicle Selected'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.arrivalTime')); ?></b>
                                    <p><?php echo e(($event->logistics && $event->logistics->arrival_time != NULL) ? $event->logistics->arrival_time:'No Time Set'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.ContactOnTheDay')); ?></b>
                                    <p><?php echo e(($event->logistics &&$event->logistics->contact_on_day != NULL) ? $event->logistics->contact_on_day:'No Contact Added'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.staffChoice')); ?></b>
                                    <p><?php echo e(($event->logistics &&$event->logistics->staff_choice != NULL) ? $event->logistics->staff_choice:'No Staff Selected'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.contactPhone')); ?></b>
                                    <p><?php echo e(($event->logistics && $event->logistics->contact_phone != NULL) ? $event->logistics->contact_phone:'No Contact Added'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <b><?php echo e(trans('event.functionAddress')); ?></b>
                                    <p><?php echo e(($event->logistics && $event->logistics->function_address != NULL) ? $event->logistics->function_address:'No Address Added'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(Sentinel::getUser()->hasAccess(['docs.read']) || Sentinel::inRole('admin')): ?>
                        <div id="doc" class="tab-pane fade">
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            <div class="row">
                                
                                <div class="col-md-12 row text-left">
                                    <div class="col-md-4"><h3><b><?php echo e(trans('event.grandTotal')); ?> :</b>
                                            <?php if($currency_position == 'left'): ?>
                                                <span><?php echo e($currency); ?> <?php echo e(($event->financials) ? $event->financials->grand_total :'0'); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e(($event->financials) ? $event->financials->grand_total :'0'); ?> <?php echo e($currency); ?></span>
                                            <?php endif; ?>
                                        </h3></div>
                                    <div class="col-md-4"><h3><b><?php echo e(trans('event.amountDue')); ?> :</b>
                                            <?php if($currency_position == 'left'): ?>
                                                <span><?php echo e($currency); ?> <?php echo e(($event->financials) ? $event->financials->amount_due:'0'); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e(($event->financials) ? $event->financials->amount_due:'0'); ?> <?php echo e($currency); ?></span>
                                            <?php endif; ?>
                                        </h3></div>
                                    <div class="col-md-4 text-right share"><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#share"><?php echo e(trans('Share')); ?></a></div>
                                </div>
                            </div>
                            <div style="border: 1px solid #ccc">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(trans('event.srNo')); ?></th>
                                        <th><?php echo e(trans('event.documentName')); ?></th>
                                        <th><?php echo e(trans('event.documentType')); ?></th>
                                        
                                        <th colspan="3"><?php echo e(trans('event.action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($event->event_document) > 0): ?>
                                        <?php $__currentLoopData = $event->event_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $documents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($documents->name); ?></td>
                                                <td><?php echo e($documents->doc_type); ?></td>
                                                
                                                <td colspan="3">
                                                    <ul>
                                                        <?php if(Sentinel::getUser()->hasAccess(['event_'.strtolower($documents->name).'.write']) || Sentinel::inRole('admin')): ?>
                                                            <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/edit')); ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if(Sentinel::getUser()->hasAccess(['event_'.strtolower($documents->name).'.read']) || Sentinel::inRole('admin')): ?>
                                                                <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/'.strtolower($documents->name).'pdf')); ?>"
                                                                                                class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                                <li style="display: inline;"><a href="<?php echo e(url($type.'/'.$event->id.'/'.strtolower($documents->name).'pdf?download=pdf')); ?>"
                                                                                                class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    
                                                    
                                                    
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5"><?php echo e(trans('event.noDocumentCreated')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="share" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h4 class="modal-title"><?php echo e(trans('event.share')); ?></h4>

                                        </div>
                                        <div class="modal-body">
                                            <div align="center">
                                                <div class="nav nav-pills">
                                                    <a data-toggle="pill" href="#reciept"><?php echo e(trans('event.recipients')); ?></a> -
                                                    <a data-toggle="pill" href="#temp"><?php echo e(trans('event.template')); ?></a> -
                                                    <a data-toggle="pill" href="#msg"><?php echo e(trans('event.message')); ?></a>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="tab-content">
                                                <div id="reciept" class="tab-pane fade in active">
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <p><?php echo e(trans('event.receiveMessage')); ?></p>
                                                    <?php if(count($event->contacts) > 0): ?>
                                                        <?php $__currentLoopData = $event->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label>
                                                                <input type="checkbox" value="<?php echo e($contacts->email); ?>" class='icheck' name="doc_share" id="doc_share">
                                                                <?php echo e($contacts->name); ?>

                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <label>
                                                            <?php echo e(trans('event.noContactsAdded')); ?>

                                                        </label>
                                                    <?php endif; ?>
                                                    <h3><?php echo e(trans("event.staff")); ?></h3>
                                                    <hr>
                                                    <p><?php echo e(trans('event.receiveReplies')); ?></p>
                                                    <div class="controls">
                                                        <?php echo Form::select('share_doc_users[]',isset($staffs)?$staffs:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"share_doc_users",'multiple'=>'multiple']); ?>

                                                        <span class="help-block"><?php echo e($errors->first('menu_choice', ':message')); ?></span>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#temp"><?php echo e(trans('event.next')); ?></button>
                                                    </div>
                                                </div>
                                                <div id="temp" class="tab-pane fade">
                                                    <p><?php echo e(trans('event.personalEmailTemplate')); ?></p>
                                                    <h3><?php echo e(trans('event.generalEmailTemplate')); ?></h3>
                                                    <hr>
                                                    <div class="form-group <?php echo e($errors->has('template') ? 'has-error' : ''); ?>">
                                                        <?php echo Form::label('template', trans('event.template'), ['class' => 'control-label required']); ?>

                                                        <div class="controls">
                                                            <?php echo Form::select('template', isset($email_templates)?$email_templates:[0=>trans('template')], null, ['id'=>'email_template', 'class' => 'form-control select2']); ?>

                                                            <span class="help-block"><?php echo e($errors->first('template', ':message')); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#reciept"><?php echo e(trans('event.previous')); ?></button>
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#msg"><?php echo e(trans('event.next')); ?></button>
                                                    </div>
                                                </div>
                                                <div id="msg" class="tab-pane fade">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="<?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
                                                                <?php echo Form::label('subject', trans('event.subject'), ['class' => 'control-label required']); ?>

                                                                <div class="controls">
                                                                    <?php echo Form::text('subject', null, ['class' => 'form-control','placeholder' => 'Blueware Restaurant : Contract Comment[Web,Dec 20,2017]','id'=>'share_doc_subject']); ?>

                                                                    <span class="help-block"><?php echo e($errors->first('subject', ':message')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group required <?php echo e($errors->has('billing_notes') ? 'has-error' : ''); ?>">
                                                                <?php echo Form::label('billing_notes', trans('event.billingNotes'), ['class' => 'control-label required']); ?>

                                                                <div class="controls">
                                                                    <?php echo Form::textarea('billing_notes', null, ['class' => 'form-control','id'=> 'text']); ?>

                                                                    <span class="help-block"><?php echo e($errors->first('billing_notes', ':message')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5"><h3><?php echo e(trans('event.includeDocuments')); ?></h3></div>
                                                        
                                                        
                                                        
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <?php $__currentLoopData = $event->event_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(Sentinel::getUser()->hasAccess(['event_'.strtolower($document->name).'.read']) || Sentinel::inRole('admin')): ?>
                                                                <input type="checkbox" value="<?php echo e($document->id); ?>" name="document_share"/><?php echo e($document->name); ?>

                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-toggle="pill" data-target="#temp"><?php echo e(trans('event.previous')); ?></button>
                                                        <button type="button" class="btn btn-warning" onclick="shareDocument()"><?php echo e(trans('event.submit')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            

                            
                            
                        </div>
                    <?php endif; ?>

                    <?php if(Sentinel::getUser()->hasAccess(['event_discussion.read']) || Sentinel::inRole('admin')): ?>
                        <div id="dis" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h3><?php echo e(trans('event.discussion')); ?></h3>
                                </div>
                                <?php if(Sentinel::getUser()->hasAccess(['event_discussion.write']) || Sentinel::inRole('admin')): ?>
                                    <div class="col-md-6 text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#start_discussion"><?php echo e(trans('event.startDiscussion')); ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="start_discussion" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" ><b><?php echo e(trans('event.startDiscussion')); ?></b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group <?php echo e($errors->has('dis_with') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('dis_with', trans('event.dis_with'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('dis_with',["Staff" => "Staff","Guest" => "Guest"], null,['class' => 'form-control select2',"id"=>"dis_with",'onchange'=>'showGuest(this.value)']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('dis_with', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('subject', trans('event.subject'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('subject', null, ['class' => 'form-control', 'placeholder'=>'Subject','id'=>'discussion_subject']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('subject', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group required <?php echo e($errors->has('task_desc') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('discuss_discription', trans('event.discussionDescription'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('discuss_discription', null, ['class' => 'form-control','id'=>'discussion_details']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('discuss_discription', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('recipients') ? 'has-error' : ''); ?>" id="staff_list">
                                                <?php echo Form::label('recipients', trans('event.recipients'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('recipients[]',isset($staffs)?$staffs:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"discussion_users",'multiple'=>'multiple']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('recipients', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('recipients') ? 'has-error' : ''); ?>" id="guest_list">
                                                <?php echo Form::label('recipients', trans('event.recipients'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('recipients[]',isset($guests)?$guests:[0=>trans('-- Select --')], null,['class' => 'form-control select2',"id"=>"discussion_users1",'multiple'=>'multiple']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('recipients', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span><?php echo e(trans('event.chooseFile')); ?></span><input type="file" id="discussion_file"/></span>
                                                <span class="fileinput-filename"></span><span class="fileinput-new"><?php echo e(trans('event.noFileChosen')); ?></span>
                                            </div>
                                            <div align="left">
                                                <span><a class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('event.cancel')); ?></a></span>
                                                <span> <a class="btn btn-primary" id="disc_save" onclick="addDiscussion()"><?php echo e(trans('event.save')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group" id="accordion">
                                <?php if(count($event->discussion) > 0): ?>
                                    <?php $__currentLoopData = $event->discussion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="event-collapse-view collapsed">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($key); ?>">
                                                <h4 class="panel-title"><span class="discuss-button"><?php echo e($value->dis_with); ?></span><?php echo e(trans('event.generalDiscussion')); ?></h4>
                                            </a>
                                        </div>
                                        <div id="collapse<?php echo e($key); ?>" class="panel-collapse collapse form-panel-collapse">
                                            <div class="panel-body row">
                                                <div class="col-md-1">
                                                    <img class="discuss-user-dp" src="/uploads/avatar/<?php echo e($user_data->user_avatar); ?>">
                                                </div>
                                                <div class="col-md-11">
                                                    <p><b><?php echo e($user_data->first_name . ' ' . $user_data->last_name); ?></b> <?php echo e(date('i',strtotime($value->created_at))); ?> minutes
                                                        ago <?php echo e(count(explode(",",$value->recipients))); ?> recipients</p><br>
                                                    <b><?php echo e($value->subject); ?></b><br>
                                                    <p><?php echo e($value->description); ?></p>
                                                    <p><?php echo e(trans('event.sincerely')); ?> ,<br>
                                                        <?php echo e($user_data->first_name . ' ' . $user_data->last_name); ?><br>
                                                        <b><?php echo e($user_data->email); ?></b><br>
                                                        <?php echo e($value->phone_number); ?><br>
                                                    </p>
                                                    
                                                        
                                                            
                                                        
                                                        
                                                            
                                                                
                                                                
                                                            
                                                        
                                                    
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?php if($value->media != NULL): ?>
                                                            <img class="discuss-user-dp" width="100%" height="40%" src="<?php echo e($value->media); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="controls">
                                                            <?php echo Form::textarea('msg', null, ['class' => 'form-control','placeholder'=> 'Enter your comment here...','id'=>'discussionMsg_'.$key]); ?>

                                                            <span class="help-block"><?php echo e($errors->first('msg', ':message')); ?></span>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <h3><?php echo e(trans('event.recipients')); ?></h3>
                                                        <?php
                                                            if($value->dis_with == 'Guest'){
                                                                $recipients = \App\Models\Customer::whereIn('id', explode(",", $value->recipients))->get();
                                                            }else{
                                                                $recipients = \App\Models\User::whereIn('id', explode(",", $value->recipients))->get();
                                                            }
                                                        ?>
                                                        <?php $__currentLoopData = $recipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <input type="checkbox" value="<?php echo e($user->id); ?>" name="discussionUsers_<?php echo e($key); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <br>
                                                        <?php if(Sentinel::getUser()->hasAccess(['event_discussion.write']) || Sentinel::inRole('admin')): ?>
                                                            <a class="btn btn-primary" onclick="sendMailToRecipients('<?php echo e($key); ?>','<?php echo e($value->subject); ?>')"><?php echo e(trans('Send')); ?></a>
                                                            <a href="#" class="btn btn-primary"><?php echo e(trans('event.cancel')); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <?php echo e(trans('event.noDiscussionStarted')); ?>

                                            </h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(Sentinel::getUser()->hasAccess(['event_task.read']) || Sentinel::inRole('admin')): ?>
                        <div id="task" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    
                                    
                                    
                                    <?php if(Sentinel::getUser()->hasAccess(['event_tasks.write']) || Sentinel::inRole('admin')): ?>
                                        <li style="display: inline;">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTask"><?php echo e(trans('event.addTask')); ?></button>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <h3><?php echo e(trans('event.taskList')); ?></h3>
                            <hr>
                            <table border="0" id="taskTable">
                                <?php if(count($event->tasks) > 0): ?>
                                    <?php $__currentLoopData = $event->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><b><?php echo e($tasks->task_description); ?></b><br><?php echo e(date('h:i a',strtotime($tasks->created_at))); ?></td>
                                            <td><?php echo e($tasks->priority); ?></td>
                                            <td><b><?php echo e(($tasks->userAssignes) ? $tasks->userAssignes->first_name : ''); ?></b></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>

                                    </tr>
                                <?php endif; ?>
                            </table>
                            <div class="modal fade" id="addTask" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" ><b><?php echo e(trans('event.addTask')); ?></b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group required <?php echo e($errors->has('task_desc') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('task_desc', trans('event.taskDescription'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('task_desc', null, ['class' => 'form-control','id'=>'taskDescription']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('task_desc', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('associated_to') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('associated_to', trans('event.associatedTo'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php
                                                        $temp = explode(' ', ucwords($event->contactus->event_type_trashed->name));
                                                        $result = '';
                                                        foreach($temp as $t)
                                                            $result .= $t[0];
                                                        $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($event->booking->from_date))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$event->start_time)));
                                                    ?>
                                                    <?php echo Form::select('associated_to', [$event->id => $final_name], $event->id, ['id'=>'associated_to', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('associated_to', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('assigned_to') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('assigned_to', trans('event.associatedTo'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('assigned_to', isset($assignees)?$assignees:[0=>trans('Assigned To')], null, ['id'=>'assigned_to', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('assigned_to', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group required <?php echo e($errors->has('due_date') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('due_date', trans('event.deadline'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::date('due_date', null, ['class' => 'form-control','id'=>'task_due_date']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('due_date', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo e($errors->has('priority') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('priority', trans('event.priority'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('priority', ['low'=>'Low','medium'=>'Medium','high'=>'High'], null, ['id'=>'task_priority', 'class' => 'form-control']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('priority', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div align="left">
                                                <span><a class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('event.cancel')); ?></a></span>
                                                <span> <a onclick="saveTasks()" class="btn btn-primary"><?php echo e(trans('event.save')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(Sentinel::getUser()->hasAccess(['event_note.read']) || Sentinel::inRole('admin')): ?>
                        <div id="note" class="tab-pane fade">
                            <div align="right">
                                <ul>
                                    
                                    
                                    
                                    <?php if(Sentinel::getUser()->hasAccess(['event_note.write']) || Sentinel::inRole('admin')): ?>
                                        <li style="display: inline">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNote"><?php echo e(trans('event.addNotes')); ?></button>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <h3><b><?php echo e(trans('event.note')); ?></b></h3>
                            <div id="noteTable">
                                <?php if(count($event->notes) > 0): ?>
                                    <?php $__currentLoopData = $event->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <hr>
                                            <p><?php echo e($note->note); ?></p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div>
                                        <hr>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="addNote" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" ><?php echo e(trans('event.note')); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group required <?php echo e($errors->has('note') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('note', trans('event.note'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::textarea('note', null, ['class' => 'form-control','id'=>'noteDescription']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('note', ':message')); ?></span>
                                                </div>
                                            </div>
                                            <div align="left">
                                                <a class="btn btn-primary" data-dismiss="modal"> <?php echo e(trans('event.cancel')); ?></a></span>
                                                <span> <a class="btn btn-primary" onclick="addNote()"><?php echo e(trans('event.save')); ?></a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(Sentinel::getUser()->hasAccess(['event_payment.read']) || Sentinel::inRole('admin')): ?>
                        <div id="payment" class="tab-pane fade">
                            <div class="col-sm-12">
                                <div class="col-md-6">
                                    <div align="left">
                                        <b>Grand Total :- </b>
                                        <?php if($currency_position == 'left'): ?>
                                            <?php echo e($currency); ?><?php echo e(($event->financials && $event->financials->grand_total != NULL) ? $event->financials->grand_total : '0'); ?>

                                        <?php else: ?>
                                            <?php echo e(($event->financials && $event->financials->grand_total != NULL) ? $event->financials->grand_total : '0'); ?><?php echo e($currency); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php $remaining = (($event->financials && $event->financials->amount_due != NULL) ? $event->financials->amount_due : 0) ?>
                                <div class="col-md-6">
                                    <div align="right">
                                        <ul>
                                            
                                            
                                            
                                            <?php if(Sentinel::getUser()->hasAccess(['event_payment.write']) || Sentinel::inRole('admin')): ?>
                                                <?php if($remaining != 0): ?>
                                                    <li style="display: inline">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payModal" id="addPayButton"><?php echo e(trans('event.addPayment')); ?></button>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <li style="display: inline">
                                                <a href="<?php echo e(url('event/' . $event->id . '/invoicepdf' )); ?>" class="btn btn-primary"><?php echo e(trans('event.print_invoice')); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3><?php echo e(trans('event.payment')); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><b><?php echo e(trans('event.customerFacingTime')); ?></b></div>
                                <div class="col-md-2"><b><?php echo e(trans('event.amount')); ?></b></div>
                                <div class="col-md-2"><b><?php echo e(trans('event.due')); ?></b></div>
                                <div class="col-md-1"><b><?php echo e(trans('event.status')); ?></b></div>
                                <div class="col-md-1"><b><?php echo e(trans('event.method')); ?></b></div>
                                <div class="col-md-1"><b><?php echo e(trans('event.id')); ?></b></div>
                                <div class="col-md-3"><b><?php echo e(trans('event.action')); ?></b></div>
                            </div>
                            <input type="hidden" id="payment_id_edit" value="">
                            <div id="paymentTable">
                                <?php if(count($event->payment) > 0): ?>
                                    <?php $__currentLoopData = $event->payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row payment" id="payment_<?php echo e($payments->id); ?>">
                                            <div class="col-md-2"><?php echo e($payments->customer_facing_title); ?></div>
                                            <?php if($currency_position == 'left'): ?>
                                                <div class="col-md-2" id="pay_amount_<?php echo e($payments->id); ?>"><?php echo e($currency); ?><?php echo e($payments->amount); ?></div>
                                            <?php else: ?>
                                                <div class="col-md-2" id="pay_amount_<?php echo e($payments->id); ?>"><?php echo e($payments->amount); ?> <?php echo e($currency); ?></div>
                                            <?php endif; ?>
                                            <div class="col-md-2"><?php echo e(date('D d,Y',strtotime($payments->created_at))); ?></div>
                                            <div class="col-md-1" id="pay_status_<?php echo e($payments->id); ?>"><?php echo e($payments->status); ?></div>
                                            <div class="col-md-1" id="pay_type_<?php echo e($payments->id); ?>"><?php echo e(($payments->paymentMethod == NULL) ? '' : $payments->paymentMethod->name); ?></div>
                                            <div class="col-md-1"><?php echo e($payments->id); ?></div>
                                            <div class="col-md-3 row">
                                                <?php if(Sentinel::getUser()->hasAccess(['event_payment.write']) || Sentinel::inRole('admin')): ?>
                                                    <?php if($payments->status == 'New'): ?>
                                                        <button type="button" class="btn btn-primary" id="pay_button_<?php echo e($payments->id); ?>" onclick="openPay('<?php echo e($payments->id); ?>')"><?php echo e(trans('event.pay')); ?></button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if(Sentinel::getUser()->hasAccess(['event_payment.write']) || Sentinel::inRole('admin')): ?>
                                                    <button type="button" class="btn" onclick="editPayment('<?php echo e($payments->id); ?>')"><span class="fa fa-fw fa-pencil text-warning"></span></button>
                                                <?php endif; ?>
                                                
                                                        
                                                                
                                                
                                                
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="row payment">
                                        <div class="col-md-2"><?php echo e(trans('event.noPaymentsDone')); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 total_pay">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3><b>Total OutStanding : </b>
                                    <?php if($currency_position == 'left'): ?>
                                        <span id="remaining"><?php echo e($currency); ?><?php echo e($remaining); ?></span>
                                    <?php else: ?>
                                        <span id="remaining"><?php echo e($remaining); ?><?php echo e($currency); ?></span>
                                        <?php endif; ?></h3>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" onclick="payTotal()"><?php echo e(trans('event.totalpay')); ?></button>
                                </div>
                                </div>
                            </div>
                            <div class="modal fade" id="payModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center"><?php echo e(trans('event.newPayment')); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('amount', trans('event.amount'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::select('amount', ["0"=>"Select Amount",$remaining => $remaining], null, ['id'=>'payment_amount', 'class' => 'form-control','onchange'=>'setCustomAmount(this.options[this.selectedIndex].value)']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('amount', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input id="custom_amount" type="text" class="form-control" name="email" placeholder="Amount">
                                                </div>
                                            </div>

                                            
                                                
                                                
                                                    
                                                    
                                                
                                            

                                            <div class="form-group required <?php echo e($errors->has('payment_dead_line') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_dead_line', trans('event.deadline'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::date('payment_dead_line', null, ['class' => 'form-control','id'=>'payment_dead_line']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_dead_line', ':message')); ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group required <?php echo e($errors->has('payment_title') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_title', trans('event.customerFacingTime'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('payment_title', null, ['class' => 'form-control','id'=>'payment_title']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_title', ':message')); ?></span>
                                                </div>
                                            </div>


                                            <div class="form-group required <?php echo e($errors->has('payment_note') ? 'has-error' : ''); ?>">
                                                <?php echo Form::label('payment_note', trans('event.internalNote'), ['class' => 'control-label required']); ?>

                                                <div class="controls">
                                                    <?php echo Form::text('payment_note', null, ['class' => 'form-control','id'=>'payment_note']); ?>

                                                    <span class="help-block"><?php echo e($errors->first('payment_note', ':message')); ?></span>
                                                </div>
                                            </div>

                                            
                                                
                                                
                                                    
                                                    
                                                
                                            
                                            <div align="left">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo e(trans('event.cancel')); ?></button>
                                                <button type="button" class="btn btn-warning" onclick="savePayment()"><?php echo e(trans('event.save')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pay" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">Pay</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <?php echo Form::label('', 'Deposit Type', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::select('method', isset($deposit_type)?$deposit_type:[0=>trans('-- Select Payment Method --')], null, ['id'=>'done_method_id', 'class' => 'form-control' ,'onchange' => 'showData()']); ?>

                                    </div>
                                </div>

                                <div class="form-group" id="card_no">
                                    <?php echo Form::label('', 'Card No.', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('card_no', null, ['id'=>'card_no_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <div class="form-group" id="holder_name">
                                    <?php echo Form::label('', 'Holder Name', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('holder_name', null, ['id'=>'holder_name_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <?php
                                    $months = ["01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December"];
                                ?>
                                <div class="form-group" id="month">
                                    <?php echo Form::label('', 'Month', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::select('month', $months , null, ['id'=>'month_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <div class="form-group" id="year">
                                    <?php echo Form::label('', 'Year', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('year', null, ['id'=>'year_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <div class="form-group" id="cheque_no">
                                    <?php echo Form::label('', 'Cheque No.', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('cheque_no', null, ['id'=>'cheque_no_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <div class="form-group" id="gift_card_no">
                                    <?php echo Form::label('', 'Gift Card No.', ['class' => 'control-label']); ?>

                                    <div class="controls">
                                        <?php echo Form::text('gift_card_no', null, ['id'=>'gift_card_no_text', 'class' => 'form-control']); ?>

                                    </div>
                                </div>

                                <div align="left">
                                    <button type="button" class="btn btn-warning" onclick="paymentDone()">Submit</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>

                            </div>
                            </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4">
    <div class="event_show_section">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
        <div class="col-md-12">
            <div class="details defaultbox">
                <h3><b><?php echo e(trans('event.eventInformation')); ?></b></h3>
                <div class="event_info_box">
                    <div class="row">
                        <div class="col-md-6">
                            <b><?php echo e(trans('event.event_name')); ?></b>
                            <?php
                                $temp = explode(' ', ucwords($event->contactus->event_type_trashed->name));
                                $result = '';
                                foreach($temp as $t)
                                    $result .= $t[0];
                                $final_name = $result .'_Event_' . str_replace("-",'',date('d-m-Y',strtotime($event->booking->from_date))) . '' . str_replace(":",'',str_replace( "pm",'',str_replace("am",'',$event->start_time)));
                            ?>
                            <p><?php echo e($final_name); ?></p>
                        </div>
                        <div class="col-md-6">
                            <b><?php echo e(trans('event.location')); ?></b>
                            <p><?php echo e($event->booking->location_trashed->name); ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <b><?php echo e(trans('event.booking')); ?></b>
                            <p><?php echo e($event->booking->booking_name); ?></p>
                        </div>
                        <div class="col-md-6">
                            <b><?php echo e(trans('event.room')); ?></b>
                            <p><?php echo e(implode(",",\App\Models\EventRooms::select('room_name')->whereIn('id',explode(",",$event->rooms))->get()->pluck('room_name')->toArray())); ?></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <b><?php echo e(trans('event.when')); ?></b>
                            <p><b>From </b><?php echo e(date('D,M d,Y',strtotime($event->booking->from_date))); ?> - <?php echo e($event->start_time); ?><br>
                                <b><?php echo e(trans('event.to')); ?></b> <?php echo e($event->end_time); ?>

                            </p>


                        </div>

                        <div class="col-md-12">
                            <div class="event_info">
                            <b><?php echo e(trans('event.status')); ?></b>
                            <?php if(ucwords(strtolower($event->status))== 'Prospect'): ?>
                                <p class="prospect__status"><?php echo e(ucwords(strtolower($event->status))); ?></p>
                            <?php elseif(ucwords(strtolower($event->status))== 'Tentative'): ?>
                                <p class="tentative__status"><?php echo e(ucwords(strtolower($event->status))); ?></p>
                            <?php elseif(ucwords(strtolower($event->status))== 'Definite'): ?>
                                <p class="definite__status"><?php echo e(ucwords(strtolower($event->status))); ?></p>
                            <?php elseif(ucwords(strtolower($event->status))== 'Close'): ?>
                                <p class="close__status"><?php echo e(ucwords(strtolower($event->status))); ?></p>
                            <?php elseif(ucwords(strtolower($event->status))== 'Lost'): ?>
                                <p class="lost__status"><?php echo e(ucwords(strtolower($event->status))); ?></p>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
</div>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('js/editor.js')); ?>" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $("#text").Editor();

                $("#discussion_users").select2({
                    placeholder: "<?php echo e(trans('salesteam.staff_members')); ?>",
                    theme: 'bootstrap'
                }).find("option:first").attr({
                    selected: false
                });
                $("#discussion_users1").select2({
                    placeholder: "<?php echo e(trans('salesteam.guest')); ?>",
                    theme: 'bootstrap'
                }).find("option:first").attr({
                    selected: false
                });

                $('#guest_list').hide();
                $("#share_doc_users").select2({
                    placeholder: "<?php echo e(trans('salesteam.staff_members')); ?>",
                    theme: 'bootstrap'
                }).find("option:first").attr({
                    selected: false
                });
            });

            function saveTasks() {
                var taskDescription = $('#taskDescription').val();
                var associated_to = $('#associated_to').val();
                var assignee = $('#assigned_to').val();
                var due_date = $('#task_due_date').val();
                var priority = $('#task_priority').val();

                $.ajax({
                    url: '<?php echo e(url($type.'/addTask')); ?>',
                    type: "POST",
                    data: {
                        event_id: '<?php echo e($event->id); ?>',
                        task_description: taskDescription,
                        associated_to: associated_to,
                        assigned_to: assignee,
                        dead_line: due_date,
                        priority: priority,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        var html = "<tr><td><input type='checkbox'></td>" +
                            "<td><b>" + taskDescription + "</b><br>" + data.date + "</td>" +
                            "<td>" + priority + "</td>" +
                            "<td><b>" + data.user + "</b></td>" +
                            "</tr>";
                        $('#addTask').modal('hide');
                        if($('#addTask .modal-body').html() == ''){
                            $('#taskTable').html(html);
                        }else{
                            $('#taskTable').append(html);
                        }
                    }
                });
            }

            function addNote() {
                var noteDescription = $('#noteDescription').val();

                $.ajax({
                    url: '<?php echo e(url($type.'/addNote')); ?>',
                    type: "POST",
                    data: {event_id: '<?php echo e($event->id); ?>', note_description: noteDescription, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        var html = "<div>" +
                            "<hr>" +
                            "<p>" + noteDescription + "</p>" +
                            "</div>";

                        $('#noteTable').append(html);
                        $('#addNote').modal('hide');
                    }
                });
            }

            function savePayment() {
                var amount = $('#custom_amount').val();
                var dead_line = $('#payment_dead_line').val();
                var title = $('#payment_title').val();
                var note = $('#payment_note').val();
                var id = $('#payment_id_edit').val();
                var event_id = '<?php echo e($event->id); ?>';

                $('#custom_amount').val('');
                $('#payment_dead_line').val('');
                $('#payment_title').val('');
                $('#payment_note').val('');
                $('#payment_id_edit').val('');

                if (amount == '') {
                    toastr["error"]("Enter Some Amount");
                    return;
                }

                if (dead_line == '') {
                    toastr["error"]("Select a deal line");
                    return;
                }

                if (title == '') {
                    toastr["error"]("Enter Some title");
                    return;
                }

                if (id != '') {
                    $.ajax({
                        url: '<?php echo e(url($type.'/updatePayment')); ?>',
                        type: "POST",
                        data: {id: id, amount: amount, dead_line: dead_line, event_id : event_id, title: title, note: note, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            var html =
                                '<div class="col-md-2">' + title + '</div>' +
                                <?php if($currency_position == 'left'): ?>
                                    '<div class="col-md-2" id="pay_amount_'+id+'"><?php echo e($currency); ?>' + amount + '</div>' +
                                <?php else: ?>
                                    '<div class="col-md-2" id="pay_amount_'+id+'">' + amount + '<?php echo e($currency); ?></div>' +
                                <?php endif; ?>
                                '<div class="col-md-2">' + data.date + '</div>' +
                                '<div class="col-md-1" id="pay_status_'+id+'">New</div>' +
                                '<div class="col-md-1" id="pay_type_'+id+'"></div>' +
                                '<div class="col-md-1">' + data.id + '</div>' +
                                '<div class="col-md-3 row">' +
                                '<button type="button" class="btn btn-primary" onclick="openPay('+data.id+')">Pay</button>'+
                                '<button type="button" class="btn" onclick="editPayment(' + data.id + ')"><span class="fa fa-fw fa-pencil text-warning"></span></button>' +
//                                '<button type="button" class="btn btn-primary" onclick="deletePayment(' + data.id + ')">Delete</button>' +
                                '</div>';

                            $('#payment_' + id).html(html);
                            $('#payModal').modal('hide');
                        }
                    });
                } else {
                    $.ajax({
                        url: '<?php echo e(url($type.'/addPayment')); ?>',
                        type: "POST",
                        data: {amount: amount, dead_line: dead_line,event_id : event_id, title: title, note: note, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            var html = '<div class="row payment" id="payment_' + data.id + '">' +
                                '<div class="col-md-2">' + title + '</div>' +
                                <?php if($currency_position == 'left'): ?>
                                    '<div class="col-md-2" id="pay_amount_'+data.id+'"><?php echo e($currency); ?>' + amount + '</div>' +
                                <?php else: ?>
                                    '<div class="col-md-2" id="pay_amount_'+data.id+'">' + amount + '<?php echo e($currency); ?></div>' +
                                <?php endif; ?>
                                '<div class="col-md-2">' + data.date + '</div>' +
                                '<div class="col-md-1" id="pay_status_'+data.id+'">New</div>' +
                                '<div class="col-md-1" id="pay_type_'+data.id+'"></div>' +
                                '<div class="col-md-1">' + data.id + '</div>' +
                                '<div class="col-md-3 row">' +
                                '<button type="button" id="pay_button_'+data.id+'" class="btn btn-primary" onclick="openPay('+data.id+')">Pay</button>'+
                                '<button type="button" class="btn" onclick="editPayment(' + data.id + ')"><span class="fa fa-fw fa-pencil text-warning"></span></button>' +
//                                '<button type="button" class="btn btn-primary" onclick="deletePayment(' + data.id + ')">Delete</button>' +
                                '</div>' +
                                '</div>';

                            $('#paymentTable').append(html);
                            $('#payModal').modal('hide');
                        }
                    });
                }
            }

            function paymentDone(){
                var id = $('#payment_id_edit').val();
                var type = $('#done_method_id').val();
                var type1 = $('#done_method_id option:selected').text();
                var card_no_text = $('#card_no_text').val();
                var holder_name_text = $('#holder_name_text').val();
                var month_text = $('#month_text').val();
                var year_text = $('#year_text').val();
                var cheque_no_text = $('#cheque_no_text').val();
                var gift_card_no_text = $('#gift_card_no_text').val();
                var amount = $("#pay_amount_"+id).html();
                var month_year = month_text + '/' + year_text;
                var remaning = $('#remaining').text();
                $.ajax({
                    url: '<?php echo e(url($type.'/paymentDone')); ?>',
                    type: "POST",
                    data: {id: id, type: type, card_no_text : card_no_text, holder_name_text : holder_name_text, cheque_no_text : cheque_no_text, gift_card_no_text : gift_card_no_text, month_year : month_year, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        $('#pay_status_'+id).text('Paid');
                        $('#pay_type_'+id).text(type1);
                        $('#pay_button_'+id).hide();
                        $('#pay').modal('hide');
                        var dd = parseFloat(remaning.replace('<?php echo e($currency); ?>','')) - parseFloat(amount.replace('<?php echo e($currency); ?>',''));
                        <?php if($currency_position == 'left'): ?>
                            $('#remaining').text('<?php echo e($currency); ?>' + Math.ceil(dd));
                        <?php else: ?>
                            $('#remaining').text(Math.ceil(dd) + '<?php echo e($currency); ?>');
                        <?php endif; ?>
                        if(dd <= 0){
                            $('#addPayButton').hide();
                        }
                    }
                });
            }

            function payTotal(){
                $('#custom_amount').val(parseInt($('#remaining').text().replace('<?php echo e($currency); ?>','')));
                $('#payModal').modal('show');
            }

            $(function(){
                $('#card_no').hide();
                $('#holder_name').hide();
                $('#month').hide();
                $('#year').hide();
                $('#cheque_no').hide();
                $('#gift_card_no').hide();
            });

            function openPay(id){
                $('#payment_id_edit').val(id);
                $('#pay').modal('show');
            }

            function showData(){
                var val = $('#done_method_id option:selected').text();
                if(val == 'Credit Card'){
                    $('#card_no').show();
                    $('#holder_name').show();
                    $('#month').show();
                    $('#year').show();
                    $('#cheque_no').hide();
                    $('#gift_card_no').hide();
                }else if(val == 'Cheque'){
                    $('#card_no').hide();
                    $('#holder_name').hide();
                    $('#month').hide();
                    $('#year').hide();
                    $('#cheque_no').show();
                    $('#gift_card_no').hide();
                }else if(val == 'Gift Card'){
                    $('#card_no').hide();
                    $('#holder_name').hide();
                    $('#month').hide();
                    $('#year').hide();
                    $('#cheque_no').hide();
                    $('#gift_card_no').show();
                }else{
                    $('#card_no').hide();
                    $('#holder_name').hide();
                    $('#month').hide();
                    $('#year').hide();
                    $('#cheque_no').hide();
                    $('#gift_card_no').hide();
                }
            }

            function editPayment(id) {
                $('#payment_id_edit').val(id);
                $.ajax({
                    url: '<?php echo e(url($type.'/editPayment')); ?>',
                    type: "POST",
                    data: {id: id, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        $('#custom_amount').val(data.data.amount);
                        $('#doc_id').val(data.data.doc_id);
                        $('#payment_dead_line').val(data.data.due_date);
                        $('#payment_title').val(data.data.customer_facing_title);
                        $('#payment_note').val(data.data.note);
                        $('#payment_method').val(data.data.payment_method);
                        $('#payModal').modal('show');
                    }
                });
            }

            function deletePayment(id) {
                $.ajax({
                    url: '<?php echo e(url($type.'/deletePayment')); ?>',
                    type: "POST",
                    data: {id: id, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        $('#payment_' + data.id).remove();
                    }
                });
            }

            function showGuest(value){
                if(value == 'Guest'){
                    $('#guest_list').show();
                    $('#staff_list').hide();
                }else{
                    $('#guest_list').hide();
                    $('#staff_list').show();
                }
            }

            function setCustomAmount(value) {
                $('#custom_amount').val(value);
            }

            function addDiscussion() {
                var subject = $('#discussion_subject').val();
                var details = $('#discussion_details').val();
                var dis_with = $('#dis_with').val();
                $('#disc_save').attr("disabled",true);
                var users = '';
                if(dis_with == 'Guest'){
                    users = $('#discussion_users1').val();
                }else{
                    users = $('#discussion_users').val();
                }
                var file = $('#discussion_file').prop('files');
                if (file.length != 0) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL($('#discussion_file').prop('files')[0]);
                    fileReader.onload = function () {
                        if (subject == '') {
                            toastr["error"]("Enter discussion subject");
                            return;
                        }

                        if (details == '') {
                            toastr["error"]("Enter some details");
                            return;
                        }

                        if (users == null) {
                            toastr["error"]("Select at least one recipient");
                            return;
                        }

                        $.ajax({
                            url: '<?php echo e(url($type.'/addDiscussion')); ?>',
                            type: "POST",
                            data: {event_id: '<?php echo e($event->id); ?>', dis_with : dis_with,subject: subject, details: details, users: users, file: fileReader.result, _token: '<?php echo e(csrf_token()); ?>'},
                            success: function (data) {
                                if (data.id != '')
                                    location.reload();
                                else {
                                    toastr["error"]("Sorry something went wrong");
                                    return;
                                }
                            }
                        });
                    };
                } else {
                    if (subject == '') {
                        $.notify('Enter discussion subject');
                        return;
                    }

                    if (details == '') {
                        $.notify('Enter some details');
                        return;
                    }

                    if (users == null) {
                        $.notify('Select at least one recipient');
                        return;
                    }

                    $.ajax({
                        url: '<?php echo e(url($type.'/addDiscussion')); ?>',
                        type: "POST",
                        data: {event_id: '<?php echo e($event->id); ?>', dis_with : dis_with, subject: subject, details: details, users: users, file: null, _token: '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
                            if (data.id != '')
                                location.reload();
                            else {
                                toastr["error"]("Sorry something went wrong");
                                return;
                            }
                        }
                    });
                }
            }

            function sendMailToRecipients(id, subject) {
                var yourArray = [];
                var msg = $('#discussionMsg_' + id).val();
                $("input:checkbox[name=discussionUsers_" + id + "]:checked").each(function () {
                    yourArray.push($(this).val());
                });

                if (msg == '') {
                    toastr["error"]("Enter Some Message");
                    return;
                }

                if (yourArray.length == 0) {
                    toastr["error"]("Select a Recipient");
                    return;
                }

                $.ajax({
                    url: '<?php echo e(url($type.'/sendMailToRecipients')); ?>',
                    type: "get",
                    data: {users: yourArray, subject: subject, details: msg, _token: '<?php echo e(csrf_token()); ?>'},
                    success: function (data) {
                        if (data) {
                            toastr["success"](data.msg);
                        } else {
                            toastr["success"](data.msg);
                        }
                    }
                })
            }

            function shareDocument() {
                var docArray = [];
                var contactArray = [];

                var msg = $('#text').Editor("getText");

                $("input:checkbox[name=document_share]:checked").each(function () {
                    docArray.push($(this).val());
                });

                var subject = $('#share_doc_subject').val();

                var template = $('#email_template').val();

                $("input:checkbox[name=doc_share]:checked").each(function () {
                    contactArray.push($(this).val());
                });

                var staffs = $('#share_doc_users').val();

                if (contactArray.length == 0 && staffs == null) {
                    toastr["error"]('Select at least one Recipients');
                    return;
                }

                if (subject == '') {
                    toastr["error"]('Enter subject of email');
                    return;
                }

                if (msg == '') {
                    toastr["error"]('Enter Some Message');
                    return;
                }

                $.ajax({
                    url: '<?php echo e(url($type.'/shareDocument')); ?>',
                    type: "post",
                    data: {
                        event_id: '<?php echo e($event->id); ?>',
                        msg: msg,
                        template: template,
                        staffs: staffs,
                        contact: contactArray,
                        docArray: docArray,
                        subject: subject,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        toastr["success"]('Documents Shared Successfully');
                        $('#share').modal("hide");
                    }
                });
            }
        </script>

<?php $__env->stopSection(); ?>