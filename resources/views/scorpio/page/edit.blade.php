@extends('scorpio.layouts.admin')

@section('title', 'Editing ' . $page->title)

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li><a href="{{ route('scorpio.page.index') }}">Page Management</a></li>
                <li class="active">Editing '{{ $page->title }}'</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 border-left">
                <h3>Navigation</h3>
                <a href="{{ route('scorpio.page.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Page
                </a>
                @include('scorpio.page.partials.navigation', compact('page_hierarchy'))
            </div>
            <div class="col-lg-10">
                <h3>Page Details</h3>
                {!! BootForm::open()->action(route('scorpio.page.update', [$page->id]))->put() !!}
                    {{ BootForm::bind($page) }}
    
                    @include('scorpio.page.partials.form')

                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection