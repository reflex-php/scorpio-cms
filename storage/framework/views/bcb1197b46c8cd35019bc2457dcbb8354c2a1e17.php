<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Scorpio CMS
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('scorpio.home')); ?>">
                <i class="fa fa-tachometer"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog"></i>
                Settings
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('scorpio.page.index')); ?>">
                <i class="fa fa-file-o"></i>
                Page Management
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('scorpio.theme.index')); ?>">
                <i class="fa fa-folder-o"></i>
                Theme Management
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/scorpio/users')); ?>">
                <i class="fa fa-users"></i>
                User Management
            </a>
        </li>
    </ul>
</div>