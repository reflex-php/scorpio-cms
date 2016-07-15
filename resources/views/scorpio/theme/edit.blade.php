@extends('scorpio.layouts.admin')

@section('title', 'Editing ' . $theme->name)

@section('content-header')
    <div class="jumbotron">
        <div class="container-fluid">
            <h1>Theme Management</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('scorpio.home') }}">Dashboard</a></li>
                <li><a href="{{ route('scorpio.theme.index') }}">Theme Management</a></li>
                <li class="active">Editing '{{ $theme->name }}'</li>
            </ol>
            <a href="#menu-toggle" id="menu-toggle">&laquo; Toggle Menu</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Theme Attributes</h1>
                {!! BootForm::open()->action(route('scorpio.theme.update', [$theme->id]))->multipart()->put() !!}
                    {{ BootForm::bind($theme) }}
                    @include('scorpio.theme.partials.form')
                {!! BootForm::close() !!}
                <hr>
                All these files are stored in the '<span class="text-info inline">/resources/layouts/{{ $theme->path }}/</span>' folder.
                <ul>
                    <li>Stylesheets in <span class="text-info">/css</span>,</li>
                    <li>JavaScript in <span class="text-info">/js</span>,</li>
                    <li>images in <span class="text-info">/images</span> and</li>
                    <li>partials in <span class="text-info">/partials</span></li>
                </ul>
                <hr>
                <h1>Theme Assets</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Stylesheets</h4>

                        <div class="dropzone" 
                             id="css" 
                             data-accept="text/css" 
                             data-current={{ implode($assets->stylesheets, ',') }}
                        ></div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>JavaScripts</h4>

                        <div class="dropzone" 
                             id="js" 
                             data-accept="application/javascript" 
                             data-current={{ implode($assets->javascripts, ',') }}
                        ></div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Images</h4>
                        <div class="dropzone"
                             id="images"
                             data-accept="image/png,image/jpeg"
                             data-current="{{ implode($assets->images, ',') }}"
                        ></div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Partials</h4>
                        <div class="dropzone" 
                             id="partials" 
                             data-accept="text/php" 
                             data-current={{ implode($assets->partials, ',') }}
                        ></div>
                    </div>
                </div>

                <h2>Theme Layout File</h2>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="dropzone"
                             id="layout"
                             data-accept="text/php"
                             data-max="1"
                        ></div>
                        Main theme layout file, will replace current one
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    
    function buildResourceURL(id) {
        return '{{ route('scorpio.theme.resource', [$theme->id, '']) }}/' + id;
    }

    function buildAssetURL(name) {
        return '{{ route('scorpio.theme.asset', [$theme->path, '']) }}/' + name;
    }

    function loadExistingFiles(files, myDropzone) {
        $(files).each(function(i, name) {
            file = {name: myDropzone.element.id + '/' + name, size: 0};
            myDropzone.emit("addedfile", file);
            myDropzone.createThumbnailFromUrl(file, buildAssetURL(myDropzone.element.id + '/' + name));
            myDropzone.emit("complete", file);
        });
    }

    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };

    $('.dropzone').each((i, element) => {
        var current = $(element);
        var myDropzone = current.dropzone({
            url: buildResourceURL(current.attr('id')),
            maxFilesize: 2,
            headers: headers,
            acceptedFiles: current.attr('data-accept'),
            maxFiles: current.attr('data-max') || null,
            addRemoveLinks: true,
            init: function () {
                this.on('removedfile', file => {
                    $.ajax({
                        method: 'DELETE',
                        url: buildResourceURL(current.attr('id')),
                        data: { file: file.name },
                        headers: headers
                    });
                });

                if (current.attr('data-current')) {
                    loadExistingFiles(current.attr('data-current').split(','), this);
                }
            }
        });

    });

</script>
@endpush