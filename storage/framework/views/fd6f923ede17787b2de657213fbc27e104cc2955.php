<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>
        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
            <?php echo $__env->yieldContent('title'); ?> - Scorpio CMS
        <?php else: ?>
            Scorpio CMS
        <?php endif; ?>
    </title>

    <link href="/css/vendor.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">

    <style>
        .dz-size {
            visibility: hidden !important;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <?php echo $__env->make('scorpio.layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div id="page-content-wrapper">
            <?php $__env->startSection('content-header'); ?>
                <div class="jumbotron">
                    <div class="container-fluid">
                        <h1>Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>
                        <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
                    </div>
                </div>
            <?php echo $__env->yieldSection(); ?>

            <?php echo $__env->make('scorpio.layouts.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php if (! empty(trim($__env->yieldContent('content')))): ?>
                <?php echo $__env->yieldContent('content'); ?>
            <?php else: ?>
                <?php echo $__env->make('scorpio.content.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        </div>

    </div>

    <script src="/js/vendor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <script type="text/javascript">
    $('#menu-toggle').click(function(e) {
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
        Cookies.set('side-bar-closed', $('#wrapper').hasClass('toggled'));
    });

    $(document).ready(function () {
        if ('true' == Cookies.get('side-bar-closed')) {
            $('#wrapper').css({visibility: 'none'})
                .addClass('toggled')
                .css({visibility: 'normal'});
        }
    });

    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    <?php echo $__env->yieldPushContent('page-scripts'); ?>

</body>

</html>
