<?php $__env->startSection('content'); ?>
    CONTENT HERE
<?php $__env->stopSection(); ?>
<?php echo $__env->make($theme->path . '.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>