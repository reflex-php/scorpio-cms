                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Recent Pages</h1>
                            <div class="card">
                                <div class="card-block">
                                    <ul class="list-unstyled">
                                    <?php $__empty_1 = true; foreach($pages as $page): $__empty_1 = false; ?>
                                        <li>
                                            <?php echo BootForm::open()->delete()->action(route('scorpio.page.destroy', [$page->id]))->addClass('form-inline'); ?>

                                                <?php echo e($page->title); ?>

                                                <div class="btn-group">
                                                    <a href="<?php echo e(url($page->uri)); ?>" class="btn btn-link" target="_blank">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('scorpio.page.edit', [$page->id])); ?>" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php echo BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link'); ?>

                                                </div>
                                            <?php echo BootForm::close(); ?>

                                        </li>
                                    <?php endforeach; if ($__empty_1): ?>
                                    Nothing new to show
                                    <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.page.index')); ?>">All Pages</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.page.create')); ?>"><i class="fa fa-plus"></i> New Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1>Recent Users</h1>
                            <div class="card">
                                <div class="card-block">
                                    <ul class="list-unstyled">
                                    <?php $__empty_1 = true; foreach($users as $user): $__empty_1 = false; ?>
                                        <li>
                                            <?php echo BootForm::open()->delete()->action('#')->addClass('form-inline'); ?>

                                                <?php echo e($user->name); ?>

                                                <div class="btn-group">
                                                    <a href="<?php echo e(url($user->id)); ?>" class="btn btn-link" target="_blank">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <a href="/scorpio/page/<?php echo e($user->id); ?>/edit" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php echo BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link'); ?>

                                                </div>
                                            <?php echo BootForm::close(); ?>

                                        </li>
                                    <?php endforeach; if ($__empty_1): ?>
                                    Nothing new to show
                                    <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.page.index')); ?>">All Users</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.page.create')); ?>">
                                                <i class="fa fa-plus"></i> New User
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>
                                Themes
                            </h1>
                            <div class="card">
                                <div class="card-block">
                                    <ul class="list-unstyled">
                                        <?php $__empty_1 = true; foreach($themes as $theme): $__empty_1 = false; ?>
                                            <?php echo BootForm::open()->delete()->action(route('scorpio.theme.destroy', [$theme->id]))->addClass('form-inline'); ?>

                                                <?php echo e($theme->name); ?>

                                                <div class="btn-group">
                                                    <a href="<?php echo e(route('scorpio.theme.edit', [$theme->id])); ?>" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php echo BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link'); ?>

                                                </div>
                                            <?php echo BootForm::close(); ?>

                                        <?php endforeach; if ($__empty_1): ?>
                                            <li>No Themes Currently Installed</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.theme.index')); ?>">All Themes</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(route('scorpio.theme.create')); ?>">
                                                <i class="fa fa-plus"></i> New Theme
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>