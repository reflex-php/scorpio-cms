@extends('scorpio.layouts.admin')

@section('title', 'Page Management')

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Page Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li class="active">Page Management</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Current Pages</h1>

                <a href="{{ route('scorpio.page.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Page
                </a>
                
                <div class="table-responsive">
                    <table class="table table-striped table-fluid">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Title</th>
                                <th>Created/Updated</th>
                                <th>Theme Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse($pages as $page)
                        @if ($page->active == 0)
                            <tr class="danger">
                        @else
                            <tr>    
                        @endif
                            <td>
                                {{ $page->title }}
                            </td>
                            <td>
                                {{ $page->updated_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $page->theme->name }}
                            </td>
                            <td>    
                                {!! BootForm::open()->delete()->action(route('scorpio.page.destroy', [$page->id])) !!}
                                <div class="btn-group">
                                    <a href="{{ url($page->slug) }}" class="btn btn-primary" target="_blank">
                                        <i class="fa fa-search"></i> View
                                    </a>
                                    <a href="/scorpio/page/{{ $page->id }}/edit" class="btn btn-success">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
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