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
            <div class="col-lg-2 border-left">
                <h3>Navigation</h3>
                <a href="{{ route('scorpio.page.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Page
                </a>
                @include('scorpio.page.partials.navigation')
            </div>
            <div class="col-lg-10">
                <h3>Current Pages</h3>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Title</th>
                                <th>URI</th>
                                <th>Route Name</th>
                                <th>Created/Updated</th>
                                <th>Theme Name</th>
                                <th>Active?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse($pages as $page)
                        <tr{{ !! $page->active ?: ' class=table-warning' }}>
                            <td>
                                {{ (str_repeat('&nbsp;', $page->depth * 4)) }}{{ $page->title }}
                            </td>
                            <td>{{ $page->uri }}</td>
                            <td>{{ $page->route_name }}</td>
                            <td>
                                {{ $page->updated_at->diffForHumans() }}
                            </td>
                            <td>
                                {!! $page->theme ? '<a href="' . route('scorpio.theme.edit', [$page->theme->id]) . '">' . $page->theme->name . '</a>' : '<span class="text-danger">NO THEME</span>' !!}
                            </td>
                            <td>
                                {{ !! $page->active ? 'Yes' : 'No' }}
                            </td>
                            <td>
                                {!! BootForm::open()->delete()->action(route('scorpio.page.destroy', [$page->id])) !!}
                                <div class="btn-group">
                                    <a href="{{ url($page->uri) }}" class="btn btn-primary" target="_blank">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="/scorpio/page/{{ $page->id }}/edit" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @if (!! $page->active)
                                    <a href="/scorpio/page/{{ $page->id }}/deactivate" class="btn btn-secondary">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    @else
                                    <a href="/scorpio/page/{{ $page->id }}/activate" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
                                    {!! BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-danger') !!}
                                </div>
                                {!! BootForm::close() !!}
                            </td>
                        </tr>    
                    @empty
                        <tr class="table-info" colspan="7">
                            <td>
                                No Pages
                                <a href="{{ route('scorpio.page.create') }}" class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus"></i>
                                    Create one now
                                </a>
                            </td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection