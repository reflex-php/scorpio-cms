                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Recent Pages</h1>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                    @forelse($pages as $page)
                                        <li>
                                            {!! BootForm::open()->delete()->action(route('scorpio.page.destroy', [$page->id]))->addClass('form-inline') !!}
                                                {{ $page->title }}
                                                <div class="btn-group">
                                                    <a href="{{ url($page->slug) }}" class="btn btn-link" target="_blank">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <a href="{{ route('scorpio.page.edit', [$page->id]) }}" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {!! BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link') !!}
                                                </div>
                                            {!! BootForm::close() !!}
                                        </li>
                                    @empty
                                    Nothing new to show
                                    @endforelse
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="{{ route('scorpio.page.index') }}">All Pages</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('scorpio.page.create') }}"><i class="fa fa-plus"></i> New Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1>Recent Users</h1>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                    @forelse($users as $user)
                                        <li>
                                            {!! BootForm::open()->delete()->action('#')->addClass('form-inline') !!}
                                                {{ $user->name }}
                                                <div class="btn-group">
                                                    <a href="{{ url($user->id) }}" class="btn btn-link" target="_blank">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <a href="/scorpio/page/{{ $user->id }}/edit" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {!! BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link') !!}
                                                </div>
                                            {!! BootForm::close() !!}
                                        </li>
                                    @empty
                                    Nothing new to show
                                    @endforelse
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="{{ route('scorpio.page.index') }}">All Users</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('scorpio.page.create') }}">
                                                <i class="fa fa-plus"></i> New User
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>
                                Themes
                            </h1>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                        @forelse($themes as $theme)
                                            {!! BootForm::open()->delete()->action(route('scorpio.theme.destroy', [$theme->id]))->addClass('form-inline') !!}
                                                {{ $theme->name }}
                                                <div class="btn-group">
                                                    <a href="{{ route('scorpio.theme.edit', [$theme->id]) }}" class="btn btn-link">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {!! BootForm::submit('<i class="fa fa-trash"></i>')->addClass('btn-link') !!}
                                                </div>
                                            {!! BootForm::close() !!}
                                        @empty
                                            <li>No Themes Currently Installed</li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="{{ route('scorpio.theme.index') }}">All Themes</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('scorpio.page.create') }}">
                                                <i class="fa fa-plus"></i> New Theme
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>