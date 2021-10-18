<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="nav_profile">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="<?php echo e(url('/profile')); ?>">
            <?php if($user_data->user_avatar): ?>
                <img src="<?php echo url('/').'/uploads/avatar/'.$user_data->user_avatar; ?>" alt="img"
                     class="img-rounded"/>
            <?php else: ?>
                <img src="<?php echo e(url('uploads/avatar/user.png')); ?>" alt="img" class="img-rounded"/>
            <?php endif; ?>
        </a>
        <div class="content-profile">
            <h4 class="media-heading"><?php echo e(str_limit($user_data->full_name, 25)); ?></h4>
            <ul class="icon-list">
                <li>
                    <a href="<?php echo e(url('mailbox')); ?>#/m/inbox" title="Email">
                        <i class="fa fa-fw fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('sales_order')); ?>" title="Sales Order">
                        <i class="fa fa-fw fa-usd"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('invoice')); ?>" title="Invoices">
                        <i class="fa fa-fw fa-file-text"></i>
                    </a>
                </li>
                <?php if(Sentinel::inRole('admin')): ?>
                    <li>
                        <a href="<?php echo e(url('setting')); ?>" title="Settings">
                            <i class="fa fa-fw fa-cog"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<ul class="navigation">
    <li <?php echo (Request::is( '/') ? 'class="active"' : ''); ?>>
        <a href="<?php echo e(url('/')); ?>">
            <span class="nav-icon">
         <i class="material-icons">dashboard</i>
        </span>
            <span class="nav-text"> <?php echo e(trans('left_menu.dashboard')); ?></span>
        </a>
    </li>
    <?php if(isset($user_data) && ($user_data->hasAccess(['leads.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'lead') || Request::is( 'leadcall/*') || Request::is( 'lead') ? 'class="active"' : ''); ?>>
            <a>
            <span class="nav-caret pull-right">
          <i class="fa fa-angle-right"></i>
        </span>
                <span class="nav-icon">
          <i class="material-icons ">blur_on</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.leads')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'lead') || Request::is( 'leadcall/*') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('lead')); ?>">
                        <i class="material-icons ">blur_on</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.leads')); ?></span></a>
                </li>
                <?php if(isset($user_data) && ($user_data->hasAccess(['leads.read']) && $user_data->hasAccess(['leads.write']) || $user_data->inRole('admin'))): ?>
                    <li <?php echo (Request::is('lead/import') ? 'class="active"' : ''); ?>>
                        <a href="<?php echo e(url('lead/import')); ?>">
                            <i class="material-icons">backup</i>
                            <span class="nav-text"><?php echo e(trans('left_menu.leadsimport')); ?></span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
    
    
    
    
    
    
    
    
    
    

    <li <?php echo (Request::is( 'eventReport') || Request::is( 'leadReport') || Request::is( 'bookingReport') || Request::is( 'supplierReport') ? 'class="active"' : ''); ?>>
        <a><span class="nav-caret pull-right"><i class="fa fa-angle-right"></i></span>
            <span class="nav-icon"><i class="material-icons ">assignment</i></span>
            <span class="nav-text"><?php echo e(trans('left_menu.report')); ?></span>
        </a>
        <ul class="nav-sub">
            <li <?php echo (Request::is( 'eventReport/*') || Request::is( 'eventReport') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(url('eventReport')); ?>">
                    <i class="material-icons ">filter_vintage</i>
                    <span class="nav-text"><?php echo e(trans('left_menu.eventReport')); ?></span></a>
            </li>
            <li <?php echo (Request::is( 'leadReport/*') || Request::is( 'leadReport') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(url('leadReport')); ?>">
                    <i class="material-icons ">blur_linear</i>
                    <span class="nav-text"><?php echo e(trans('left_menu.leadReport')); ?></span></a>
            </li>
            <li <?php echo (Request::is( 'bookingReport/*') || Request::is( 'bookingReport') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(url('bookingReport')); ?>">
                    <i class="material-icons ">bookmark</i>
                    <span class="nav-text"><?php echo e(trans('left_menu.bookingReport')); ?></span></a>
            </li>
            <li <?php echo (Request::is( 'supplierReport/*') || Request::is( 'supplierReport') ? 'class="active"' : ''); ?>>
                <a href="<?php echo e(url('supplierReport')); ?>">
                    <i class="material-icons ">local_shipping</i>
                    <span class="nav-text"><?php echo e(trans('left_menu.suppliersReport')); ?></span></a>
            </li>
            
                
                    
                    
            
            
                
                    
                    
            
            
                
                    
                    
            
            
                
                    
                    
            
            
                
                    
                    
            
        </ul>
    </li>

    
    <?php if(isset($user_data) && ($user_data->hasAccess(['event.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'event/*') || Request::is( 'event/*') || Request::is( 'event') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('event')); ?>">
            <span class="nav-icon">
         <i class="material-icons ">star</i>
        </span>
                <span class="nav-text"><?php echo e(trans('Event')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <?php if(isset($user_data) && ($user_data->hasAccess(['quotations.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'quotation/*') || Request::is( 'quotation')|| Request::is( 'quotation*') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('quotation')); ?>">
                <i class="material-icons ">receipt</i>
                <span class="nav-text"><?php echo e(trans('left_menu.quotations')); ?></span></a>
        </li>
    <?php endif; ?> <?php if(isset($user_data) && ($user_data->hasAccess(['invoices.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'invoice/*') || Request::is( 'invoice') || Request::is( 'invoices_payment_log/*') || Request::is( 'invoices_payment_log')
        || Request::is( 'invoice_delete_list') || Request::is('paid_invoice') ? 'class="active"' : ''); ?>>
            <a><span class="nav-caret pull-right"><i class="fa fa-angle-right"></i></span>
                <span class="nav-icon"><i class="material-icons ">web</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.invoices')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'invoice/*') || Request::is( 'invoice') || Request::is( 'invoice_delete_list') || Request::is('paid_invoice') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('invoice')); ?>">
                        <i class="material-icons ">receipt</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.invoices')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'invoices_payment_log/*') || Request::is( 'invoices_payment_log') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('invoices_payment_log')); ?>">
                        <i class="material-icons ">archive</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.payment_log')); ?></span></a>
                </li>
            </ul>
        </li>
    <?php endif; ?> <?php if(isset($user_data) && ($user_data->hasAccess(['sales_team.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'salesteam/*') || Request::is( 'salesteam') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('salesteam')); ?>">
            <span class="nav-icon">
         <i class="material-icons ">groups</i>
        </span>
                <span class="nav-text"> <?php echo e(trans('left_menu.salesteam')); ?></span>
            </a>
        </li>
    <?php endif; ?> <?php if(isset($user_data) && ($user_data->hasAccess(['logged_calls.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'call/*') || Request::is( 'call') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('call')); ?>">
            <span class="nav-icon">
         <i class="material-icons ">phone</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.calls')); ?></span>
            </a>
        </li>
    <?php endif; ?> <?php if(isset($user_data) && ($user_data->hasAccess(['sales_orders.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'sales_order/*') || Request::is( 'sales_order') || Request::is('salesorder_delete_list') || Request::is('salesorder_invoice_list') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('sales_order')); ?>">
            <span class="nav-icon">
         <i class="material-icons ">attach_money</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.sales_order')); ?></span>
            </a>
        </li>
    <?php endif; ?> <?php if(isset($user_data) && ($user_data->hasAccess(['products.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'product/*') || Request::is( 'product') || Request::is( 'category/*') || Request::is( 'category') ? 'class="active"' : ''); ?>>
            <a>
            <span class="nav-caret pull-right">
          <i class="fa fa-angle-right"></i>
        </span>
                <span class="nav-icon">
           <i class="material-icons ">shopping_basket</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.products')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'product/*') || Request::is( 'product') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('product')); ?>">
                        <i class="material-icons">layers</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.products')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'category/*') || Request::is( 'category') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('category')); ?>">
                        <i class="material-icons">gamepad</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.category')); ?></span></a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <li <?php echo (Request::is( 'calendar/*') || Request::is( 'calendar') ? 'class="active"' : ''); ?>>
        <a href="<?php echo e(url('calendar')); ?>">
            <span class="nav-icon">
        <i class="material-icons">event_note</i>
        </span>
            <span class="nav-text"><?php echo e(trans('left_menu.calendar')); ?></span>
        </a>
    </li>
    <?php if(isset($user_data) && ($user_data->hasAccess(['contacts.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'customer/*') || Request::is( 'customer') || Request::is( 'company/*') || Request::is( 'company') ? 'class="active"' : ''); ?>>
            <a>
            <span class="nav-caret pull-right">
          <i class="fa fa-angle-right"></i>
        </span>
                <span class="nav-icon">
           <i class="material-icons">web</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.companies')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'company/*') || Request::is( 'company') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('company')); ?>">
                        <i class="material-icons ">web</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.company')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'customer/*') || Request::is( 'customer') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('customer')); ?>">
                        <i class="material-icons ">person</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.agent')); ?></span></a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <?php if(isset($user_data) && ($user_data->hasAccess(['meetings.read']) || $user_data->inRole('admin'))): ?>
        <li <?php echo (Request::is( 'meeting/*') || Request::is( 'meeting') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('meeting')); ?>">
            <span class="nav-icon">
         <i class="material-icons">radio</i>
        </span>
                <span class="nav-text"><?php echo e(trans('left_menu.meetings')); ?></span>
            </a>
        </li>
    <?php endif; ?>
    <li <?php echo (Request::is( '/task/*') || Request::is( 'task') ? 'class="active"' : ''); ?>>
        <a href="<?php echo e(url('/task')); ?>">
            <span class="nav-icon">
         <i class="material-icons">event_task</i>
        </span>
            <span class="nav-text"> <?php echo e(trans('left_menu.tasks')); ?></span>
        </a>
    </li>
    <?php if(isset($user_data) && $user_data->hasAccess(['staff.read']) || $user_data->inRole('admin')): ?>
        <h4 class="mar-5 border-b">Configuration</h4>
        <li <?php echo (Request::is( 'staff/*') || Request::is( 'staff') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('staff')); ?>">
            <span class="nav-icon">
     <i class="material-icons">people_outline</i>
    </span>
                <span class="nav-text"><?php echo e(trans('left_menu.staff')); ?></span>
            </a>
        </li>
    <?php endif; ?>
    <?php if(isset($user_data) && $user_data->inRole('admin')): ?>
        <li <?php echo (Request::is( 'option/*') || Request::is( 'option') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('option')); ?>">
                <span class="nav-icon"><i class="material-icons">view_comfy</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.options')); ?></span>
            </a>
        </li>
        <li <?php echo ((Request::is( 'eventSetting/photoIndex')) ||(Request::is( 'eventSetting/entertainIndex')) ||(Request::is( 'eventSetting/decoratorIndex'))
        ||(Request::is( 'eventSetting/parkingIndex')) ||(Request::is( 'eventSetting/equipIndex')) || (Request::is( 'eventSetting/catererIndex'))
        || Request::is( 'eventSetting/transportIndex') || Request::is( 'eventSetting/eventTypes')||Request::is( 'eventSetting/catererServiceType')
        || Request::is( 'eventSetting/eventLocation') || Request::is( 'eventSetting/eventRoom')? 'class="active"' : ''); ?>>
            <a>
                <span class="nav-caret pull-right"><i class="fa fa-angle-right"></i></span>
                <span class="nav-icon"><i class="material-icons">settings_applications</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.event_setting')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'eventSetting/catererIndex') || Request::is( 'eventSetting/catererIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/catererIndex')); ?>">
                        <i class="material-icons">restaurant</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.caterer')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/photoIndex') || Request::is( 'eventSetting/photoIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/photoIndex')); ?>">
                        <i class="material-icons ">photo_camera</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.photographer')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/entertainIndex') || Request::is( 'eventSetting/entertainIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/entertainIndex')); ?>">
                        <i class="material-icons ">music_note</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.entertainer')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/decoratorIndex') || Request::is( 'eventSetting/decoratorIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/decoratorIndex')); ?>">
                        <i class="material-icons ">card_giftcard</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.decorator')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/parkingIndex') || Request::is( 'eventSetting/parkingIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/parkingIndex')); ?>">
                        <i class="material-icons ">local_parking</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.parking')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/equipIndex') || Request::is( 'eventSetting/equipIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/equipIndex')); ?>">
                        <i class="material-icons ">speaker</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.equipment')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/transportIndex') || Request::is( 'eventSetting/transportIndex') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/transportIndex')); ?>">
                        <i class="material-icons ">directions_car</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.transport')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/eventTypes') || Request::is( 'eventSetting/eventTypes') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/eventTypes')); ?>">
                        <i class="material-icons ">stars</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.eventTypes')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/catererServiceType') || Request::is( 'eventSetting/catererServiceType') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/catererServiceType')); ?>">
                        <i class="material-icons ">room_service</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.caterersTypes')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/eventLocation') || Request::is( 'eventSetting/eventLocation') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/eventLocation')); ?>">
                        <i class="material-icons ">room</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.eventLocation')); ?></span></a>
                </li>

                <li <?php echo (Request::is( 'eventSetting/eventRoom') || Request::is( 'eventSetting/eventRoom') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/eventRoom')); ?>">
                        <i class="material-icons ">airline_seat_individual_suite</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.eventRoom')); ?></span></a>
                </li>
            </ul>
        </li>
        <li <?php echo (Request::is( 'eventSetting/owner/*') || Request::is( 'eventSetting/owner') || Request::is( 'eventSetting/manager') || Request::is( 'eventSetting/leadSource') ? 'class="active"' : ''); ?>>
            <a>
                <span class="nav-caret pull-right"><i class="fa fa-angle-right"></i></span>
                <span class="nav-icon"><i class="material-icons">toys</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.eventSource')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'eventSetting/owner') || Request::is( 'eventSetting/owner') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/owner')); ?>">
                        <i class="material-icons ">perm_identity</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.owner')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/manager') || Request::is( 'eventSetting/manager') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/manager')); ?>">
                        <i class="material-icons ">person</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.manager')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventSetting/leadSource') || Request::is( 'eventSetting/leadSource') ? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventSetting/leadSource')); ?>">
                        <i class="material-icons ">leak_add</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.leadSource')); ?></span></a>
                </li>
            </ul>
        </li>
        <li <?php echo (Request::is( 'eventMenu/menu/*') || Request::is( 'eventMenu/menu') || Request::is( 'eventMenu/menuType') || Request::is( 'eventMenu/subMenu') || Request::is( 'eventMenu/menuItem') ? 'class="active"' : ''); ?>>
            <a>
                <span class="nav-caret pull-right"><i class="fa fa-angle-right"></i></span>
                <span class="nav-icon"><i class="material-icons">restaurant_menu</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.menu')); ?></span>
            </a>
            <ul class="nav-sub">
                <li <?php echo (Request::is( 'eventMenu/menu')? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventMenu/menu')); ?>">
                        <i class="material-icons ">restaurant_menu</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.menu')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventMenu/menuType')? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventMenu/menuType')); ?>">
                        <i class="material-icons ">filter_list</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.menuType')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventMenu/subMenu')? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventMenu/subMenu')); ?>">
                        <i class="material-icons ">format_indent_increase</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.subMenu')); ?></span></a>
                </li>
                <li <?php echo (Request::is( 'eventMenu/menuItem')? 'class="active"' : ''); ?>>
                    <a href="<?php echo e(url('eventMenu/menuItem')); ?>">
                        <i class="material-icons ">library_books</i>
                        <span class="nav-text"><?php echo e(trans('left_menu.menuItem')); ?></span></a>
                </li>
            </ul>
        </li>
        <li <?php echo (Request::is( 'eventSetting/depositsType') || Request::is( 'eventSetting/depositsType') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('eventSetting/depositsType')); ?>">
                <span class="nav-icon"><i class="material-icons">swap_horiz</i></span>
                <span class="nav-text"><?php echo e(trans('left_menu.depositsType')); ?></span>
            </a>
        </li>
        <li <?php echo (Request::is( 'email_template/*') || Request::is( 'email_template') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('email_template')); ?>">
            <span class="nav-icon">
     <i class="material-icons">email</i>
    </span>
                <span class="nav-text"><?php echo e(trans('left_menu.email_template')); ?></span>
            </a>
        </li>
        <li <?php echo (Request::is( 'qtemplate/*') || Request::is( 'qtemplate') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('qtemplate')); ?>">
                <i class="material-icons ">image</i>
                <span class="nav-text"><?php echo e(trans('left_menu.quotation_template')); ?></span></a>
        </li>
        <li <?php echo (Request::is( 'setting/*') || Request::is( 'setting') ? 'class="active"' : ''); ?>>
            <a href="<?php echo e(url('setting')); ?>">
            <span class="nav-icon">
     <i class="material-icons">settings</i>
    </span>
                <span class="nav-text"><?php echo e(trans('left_menu.settings')); ?></span>
            </a>
        </li>
    <?php endif; ?>
</ul>
