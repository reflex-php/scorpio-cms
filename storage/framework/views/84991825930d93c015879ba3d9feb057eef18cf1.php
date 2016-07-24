<?php $__env->startSection('title', 'Page Management'); ?>

<?php $__env->startSection('content-header'); ?>
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('scorpio.home')); ?>">Dashboard</a></li>
                <li class="active">Page Management</li>
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
                <?php echo $__env->make('scorpio.page.partials.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-lg-10">
                <h3>Current Pages</h3>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Title</th>
                                <th>URI</th>
                                <th>Route Name</th>
                                <th>Created/Updated</th>
                                <th>Theme Name</th>
                                <th>Active?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $__empty_1 = true; foreach($pages as $page): $__empty_1 = false; ?>
                        <tr<?php echo e(!! $page->active ?: ' class=table-warning'); ?>>
                            <td>
                                <?php echo e((str_repeat('&nbsp;', $page->depth * 4))); ?><?php echo e($page->title); ?>

                            </td>
                            <td><?php echo e($page->uri); ?></td>
                            <td><?php echo e($page->route_name); ?></td>
                            <td>
                                <?php echo e($page->updated_at->diffForHumans()); ?>

                            </td>
                            <td>
                                <?php echo $page->theme ? '<a href="' . route('scorpio.theme.edit', [$page->theme->id]) . '">' . $page->theme->name . '</a>' : '<span class="text-danger">NO THEME</span>'; ?>

                            </td>
                            <td>
                                <?php echo e(!! $page->active ? 'Yes' : 'No'); ?>

                            </td>
                            <td>
                                <?php echo BootForm::open()->delete()->action(route('scorpio.page.destroy', [$page->id])); ?>

                                <div class="btn-group">
                                    <a href="<?php echo e(url($page->uri)); ?>" class="btn btn-primary" target="_blank">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="/scorpio/page/<?php echo e($page->id); ?>/edit" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php if(!! $page->active): ?>
                                    <a href="/scorpio/page/<?php echo e($page->id); ?>/deactivate" class="btn btn-secondary">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <?php else: ?>
                                    <a href="/scorpio/page/<?php echo e($page->id); ?>/activate" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php echo BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-danger'); ?>

                                </div>
                                <?php echo BootForm::close(); ?>

                            </td>
                        </tr>    
                    <?php endforeach; if ($__empty_1): ?>
                        <tr class="table-info" colspan="7">
                            <td>
                                No Pages
                                <a href="<?php echo e(route('scorpio.page.create')); ?>" class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus"></i>
                                    Create one now
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('scorpio.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>