@extends('scorpio.layouts.admin')

@section('title', 'Navigation Management')

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Navigation Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li class="active">Navigation Management</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Current Navigations</h1>

                <a href="{{ route('scorpio.navigation.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Navigation
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-fluid">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Pages</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse($navigations as $navigation)
                        <tr>    
                            <td>
                                {{ $navigation->name }}
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                @forelse($navigation->pages as $page)
                                <li>
                                    <ul class="list-inline">
                                        <li>{{ $page->title }} </li>
                                        <li>
                                            <a href="{{ route('scorpio.page.edit', [$page->id]) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </li>
                                        <li>
                                            {!! BootForm::open()->delete()->action(route('scorpio.navigation.remove', [$navigation->id, $page->id])) !!}
                                                {!! BootForm::submit('<i class="fa fa-trash"></i>')->class('btn-link') !!}
                                            {!! BootForm::close() !!}
                                        </li>
                                    </ul>
                                </li>
                                @empty
                                <li class="text-danger">No pages here...</li>
                                @endforelse
                                </ul>
                            </td>
                            <td>    
                                {!! BootForm::open()->delete()->action(route('scorpio.navigation.destroy', [$navigation->id])) !!}
                                <div class="btn-group">
                                    <a href="{{ route('scorpio.navigation.edit', [$navigation->id]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                    {!! BootForm::submit('<i class="fa fa-trash"></i> Delete')->addClass('btn-danger') !!}
                                </div>
                                {!! BootForm::close() !!}
                            </td>
                        </tr>    
                    @empty
                        <tr class="table-info">
                            <td>No Pages</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection