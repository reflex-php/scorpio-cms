<?php $__env->startSection('title', 'Editing ' . $page->title); ?>

<?php $__env->startSection('content-header'); ?>
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('scorpio.home')); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(route('scorpio.page.index')); ?>">Page Management</a></li>
                <li class="active">Editing '<?php echo e($page->title); ?>'</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 border-left">
                <h3>Navigation</h3>
                <a href="<?php echo e(route('scorpio.page.create')); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Page
                </a>
                <?php echo $__env->make('scorpio.page.partials.navigation', compact('page_hierarchy'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-lg-10">
                <h3>Page Details</h3>
                <?php echo BootForm::open()->action(route('scorpio.page.update', [$page->id]))->put(); ?>

                    <?php echo e(BootForm::bind($page)); ?>

    
                    <?php echo $__env->make('scorpio.page.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('scorpio.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>