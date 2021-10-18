<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('layouts._meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts._assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
<div id="app">
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="<?php echo e(url('/')); ?>" class="logo">
            <img src="<?php echo e(asset('uploads/site/'.Settings::get('site_logo'))); ?>"
                 alt="<?php echo e(Settings::get('site_name')); ?>" class="img-responsive img_logo">

        </a>

        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                        class="fa fa-fw fa-navicon"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <?php echo $__env->make("left_menu._header-right", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">

                <!-- / .navigation -->
                <?php if(Sentinel::inRole('admin') || Sentinel::inRole('staff')): ?>
                    <?php echo $__env->make('left_menu._user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Sentinel::inRole('customer')): ?>
                    <?php echo $__env->make('left_menu._customer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side right-padding">
        <div class="right-content">
            <section class="box-shadow">
            <h1><?php echo e(isset($title) ? $title : 'Welcome'); ?></h1>
            </section>

            <!-- Notifications -->

            <!-- Content -->
            <div class="right_cont">
            <?php echo $__env->yieldContent('content'); ?>
            </div>
                    <!-- /.content -->
        </div>
    </aside>
    <!-- /.right-side -->
</div>
<!-- /.right-side -->
<!-- ./wrapper -->
</div>
<!-- global js -->
<?php echo $__env->make('layouts._assets_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    $(document).ready(function () {
        $('.date').datetimepicker({format: '<?php echo e(isset($jquery_date)?$jquery_date:"MMMM D,GGGG"); ?>',
            useCurrent: false,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }});
        $('.datetime').datetimepicker({format: '<?php echo e(isset($jquery_date_time)?$jquery_date_time:"MMMM D,GGGG H:mm"); ?>',
            useCurrent: false,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }});

    })
</script>
<?php echo $__env->yieldContent('scripts'); ?>
<!-- Default Statcounter code for
Banquetcrm.kintudesigns.com
http://banquetcrm.kintudesigns.com/ -->
<script type="text/javascript">
    var sc_project=11730517;
    var sc_invisible=1;
    var sc_security="05ebdf9c";
</script>
<script type="text/javascript"
        src="https://www.statcounter.com/counter/counter.js"
        async></script>
<noscript><div class="statcounter"><a title="Web Analytics"
                                      href="http://statcounter.com/" target="_blank"><img
                    class="statcounter"
                    src="//c.statcounter.com/11730517/0/05ebdf9c/1/" alt="Web
Analytics"></a></div></noscript>
<!-- End of Statcounter Code -->
</body>
</html>