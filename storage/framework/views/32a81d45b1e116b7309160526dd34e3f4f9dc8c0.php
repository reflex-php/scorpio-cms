<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $__env->yieldContent('page-meta-description', 'Scorpio CMS'); ?>">
    <meta name="author" content="<?php echo $__env->yieldContent('page-meta-author', 'Scorpio CMS'); ?>">
    
    <title><?php echo $__env->yieldContent('title', $page->title); ?></title>

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/vendor.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/theme-assets/<?php echo e($theme->path); ?>/css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="index.html">Scorpio CMS Default Theme</a>
            </div>

            <ul class="nav navbar-nav pull-lg-right">
                <?php echo $__env->make($theme->path . '.partials.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ul>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/theme-assets/<?php echo e($theme->path); ?>/images/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo e($page->title); ?></h1>
                        <span class="meta">Posted on <?php echo e($page->created_at->toFormattedDateString()); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php echo $page->body; ?>

                </div>
            </div>
        </div>
    </article>

    <hr>

    <?php echo $__env->make($theme->path . '.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

    <script src="/js/vendor.js"></script>

    <!-- Theme JavaScript -->
    <script src="/theme-assets/<?php echo e($theme->path); ?>/js/clean-blog.js"></script>

</body>

</html>