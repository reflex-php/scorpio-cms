@extends('scorpio.layouts.admin')

@section('title', 'Creating a new theme')

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Theme Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li><a href="{{ route('scorpio.theme.index') }}">Theme Management</a></li>
                <li class="active">Creating a theme</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! BootForm::open()->action(route('scorpio.theme.store')) !!}
                    @include('scorpio.theme.partials.form')
                {!! BootForm::close() !!}
                <hr>
                <div class="alert alert-info alert-important">You will be able to manage theme assets once you've created the initial
                    theme!
                    <br>
                    Once created, the CMS will copy the default template and structure into a directory with the slugified version of the theme name, so 'Theme Name' becomes 'theme-name', and therefor 'theme-name' becomes the path in which assets will be stored.
                </div>
            </div>
        </div>
    </div>
@endsection