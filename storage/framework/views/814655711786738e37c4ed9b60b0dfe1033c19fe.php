<ul class="fa-ul">
<?php foreach($page_hierarchy as $page): ?>
    <li>
        <a href="/scorpio/page/<?php echo e($page->id); ?>/down"><i class="fa fa-1 fa-arrow-circle-down"></i></a>
        <a href="/scorpio/page/<?php echo e($page->id); ?>/up"><i class="fa fa-1 fa-arrow-circle-up"></i></a>
        <a href="<?php echo e(url($page->uri)); ?>" target="_blank"><?php echo e($page->title); ?></a> 
    <?php if(count($page->children)): ?>
        <?php echo $__env->make('scorpio.page.partials.navigation', ['page_hierarchy' => $page->children], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>