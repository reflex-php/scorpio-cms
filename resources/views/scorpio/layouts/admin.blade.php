<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') - Scorpio CMS
        @else
            Scorpio CMS
        @endif
    </title>

    <link href="/css/vendor.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">

    <style>
        .dz-size {
            visibility: hidden !important;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        @include('scorpio.layouts.partials.sidebar')

        <div id="page-content-wrapper">
            @section('content-header')
                <div class="jumbotron">
                    <div class="container-fluid">
                        <h1>Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>
                        <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
                    </div>
                </div>
            @show

            @include('scorpio.layouts.partials.flash')

            @hasSection('content')
                @yield('content')
            @else
                @include('scorpio.content.dashboard')
            @endif
        </div>

    </div>

    <script src="/js/vendor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <script>
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

    @stack('page-scripts')

</body>

</html>
