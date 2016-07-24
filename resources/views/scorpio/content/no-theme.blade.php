<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Scorpio CMS">
    <meta name="author" content="Scorpio CMS">
    
    <title>Scorpio CMS &mdash; No Theme Found</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/vendor.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/{{ request()->url() }}">Scorpio CMS &mdash; No Theme Found</a>
        </div>
    </nav>

    <div class="container">
        <div class="row alert alert-danger">
            <div class="col-lg-1" style="vertical-align: middle !important;">
                <i class="fa fa-exclamation-triangle fa-5x" style="line-height: inherit"></i>
            </div>
            <div class="col-lg-11">
                <h1>Scorpio CMS &mdash; No Theme Found</h1>
                <hr>
                You need to supply a theme for this page to load. Go in to the Scorpio CMS
                admin and handle this issue!
                <hr>
                <a href="{{ route('scorpio.home') }}">Scorpio Dashboard</a>
            </div>
        </div>
    </div>

</body>

</html>