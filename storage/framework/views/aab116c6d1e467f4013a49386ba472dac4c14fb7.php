<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>