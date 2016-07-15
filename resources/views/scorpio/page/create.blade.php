@extends('scorpio.layouts.admin')

@section('title', 'Creating a new page')

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li><a href="{{ route('scorpio.page.index') }}">Page Management</a></li>
                <li class="active">Create a New Page</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! BootForm::open()->action(route('scorpio.page.store')) !!}
                    @include('scorpio.page.partials.form')
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection