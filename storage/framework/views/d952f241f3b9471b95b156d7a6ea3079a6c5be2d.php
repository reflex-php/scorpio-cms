                    <?php echo BootForm::text('Title', 'title')->helpBlock('Everything needs a title!'); ?>


                    <?php echo BootForm::text('URI', 'uri')->helpBlock('How is the page accessed?'); ?>


                    <?php echo BootForm::textarea('Body', 'body')->helpBlock('What the people see')->id('body-input'); ?>


                    <?php echo BootForm::select('Theme', 'theme_id')->options($themes)->helpBlock('Which theme are we using?'); ?>


                    <?php echo BootForm::checkbox('Active', 'active')->helpBlock('Are we currently showing this page?')->defaultToChecked(); ?>

                    
                    <div class="row">
                        <h3>Order</h3>
                        <div class="col-lg-9">
                        <?php echo BootForm::select('', 'order')->options(['' => '', 'before' => 'Before', 'after' => 'After', 'childOf' => 'Child Of'])->hideLabel(); ?>

                        </div>
                        <div class="col-lg-3">
                        <?php echo BootForm::select('', 'order_page')->options(['' => ''] + $pages->lists('title', 'id')->toArray())->hideLabel(); ?>

                        </div>
                    </div>
                    
                    <div>
                        <p class="text-muted">
                            Placement of this page
                        </p>
                    </div>
                    
                    <div class="btn-group">
                        <?php echo BootForm::submit('<i class="fa fa-save"></i> Lets go!')->addClass('btn-primary'); ?>


                        <a href="<?php echo e(route('scorpio.page.index')); ?>" class="btn btn-danger">
                            <i class="fa fa-cross"></i>
                            Cancel
                        </a>
                    </div>
                    
                    <?php $__env->startPush('page-scripts'); ?>
                    <script>
                        $(function() {
                            console.log('running...');
                            $('#body-input').summernote({
                                height: 300
                            });
                        });
                    </script>
                    <?php $__env->stopPush(); ?>