<?php foreach($pages as $page): ?>
    <li class="nav-item <?php echo e(Request::is($page->uri . '*') ? 'active' : ''); ?> <?php echo e(count($page->children) ? ($page->isChild() ? 'dropdown-submenu' : 'dropdown') : ''); ?>">
        <a href="<?php echo e(url($page->uri)); ?>" class="nav-link">
            <?php echo e($page->title); ?>

            <?php if(count($page->children)): ?>
                <span class="fa fa-caret-<?php echo e($page->isChild() ? 'right' : 'down'); ?>"></span>
            <?php endif; ?>
        </a>
        <?php if(count($page->children)): ?>
            <ul class="dropdown-menu">
                <?php echo $__env->make($theme->path . '.partials.navigation', ['pages' => $page->children], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ul>
        <?php endif; ?>
    </li>
<?php endforeach; ?>