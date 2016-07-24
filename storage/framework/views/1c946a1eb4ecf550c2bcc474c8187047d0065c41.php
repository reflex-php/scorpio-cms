<?php $__env->startSection('title', 'Creating a new page'); ?>

<?php $__env->startSection('content-header'); ?>
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('scorpio.home')); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(route('scorpio.page.index')); ?>">Page Management</a></li>
                <li class="active">Create a New Page</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php echo BootForm::open()->action(route('scorpio.page.store')); ?>

                    <?php echo $__env->make('scorpio.page.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('scorpio.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>