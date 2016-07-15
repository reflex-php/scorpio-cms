@extends('scorpio.layouts.admin')

@section('title', 'Theme Management')

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Theme Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li class="active">Theme Management</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Current Themes</h1>

                <a href="{{ route('scorpio.theme.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Create New Theme
                </a>
                
                <div class="table-responsive">
                    <table class="table table-striped table-fluid">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Created/Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse($themes as $theme)
                        <tr>    
                            <td>
                                {{ $theme->name }}
                            </td>
                            <td>
                                {{ $theme->updated_at->diffForHumans() }}
                            </td>
                            <td>    
                                {!! BootForm::open()->delete()->action(route('scorpio.theme.destroy', [$theme->id])) !!}
                                <div class="btn-group">
                                    <a href="{{ route('scorpio.theme.edit', [$theme->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <a href="{{ route('scorpio.theme.apply', [$theme->id]) }}" class="btn btn-warning">
                                        <i class="fa fa-file-o"></i> Apply to all pages
                                    </a>
                                    {!! BootForm::submit('<i class="fa fa-trash"></i> Delete')->addClass('btn-danger') !!}
                                </div>
                                {!! BootForm::close() !!}
                            </td>
                        </tr>    
                    @empty
                        <tr class="table-info">
                            <td>No Themes</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection