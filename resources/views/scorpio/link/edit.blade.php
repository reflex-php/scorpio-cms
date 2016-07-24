@extends('scorpio.layouts.admin')

@section('title', 'Editing navigation ' . $navigation->name)

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Navigation Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li><a href="{{ route('scorpio.navigation.index') }}">Navigation Management</a></li>
                <li class="active">Editing navigation {{ $navigation->name }}</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Editing navigation {{ $navigation->name }}</h1>

                {!! BootForm::open()->action(route('scorpio.navigation.update', [$navigation->id]))->put() !!}
                {!! BootForm::bind($navigation) !!}
    
                {!! BootForm::text('Name', 'name')->helpBlock('Name of the navigation set, this will be \'slugified\' and used as the key for you to reference in the theme views using the blade directive
                <code>@{{ navigation(\'' . $navigation->key . '\') }}</code>. The directive also takes a second parameter which would be the <code>class</code> to apply to the wrapping <code>ul</code> element.') !!}
                
                <h3>Pages within Navigation</h3>
                <hr>
                <div class="text-info">
                    Pages to place within this navigation set
                </div>
                <div class="row">
                    <div class="col-sm-2">
                    @foreach ($pages->chunk(4) as $pagesChunk)
                        <div class="row">
                        @foreach ($pagesChunk as $page)
                            <div class="col-lg-4">
                                @if(in_array($page->id, $navigation->pages->pluck('id')->toArray()))
                                {!! BootForm::checkbox($page->title, 'pages[]')->value($page->id)->checked() !!}
                                @else
                                {!! BootForm::checkbox($page->title, 'pages[]')->value($page->id) !!}
                                @endif
                            </div>
                        @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>
                <br>
                <div class="btn-group">
                    {!! BootForm::submit('<i class="fa fa-save"></i> Lets go!')->addClass('btn-primary') !!}

                    <a href="{{ route('scorpio.navigation.index') }}" class="btn btn-danger">
                        <i class="fa fa-cross"></i>
                        Cancel
                    </a>
                </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection