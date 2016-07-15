                    {!! BootForm::text('Title', 'title')->helpBlock('Everything needs a title!') !!}

                    {!! BootForm::text('Slug', 'slug')->helpBlock('What appears as the URL - needs to be unique, optional, will be set to title (with slugification) if one is not provided') !!}

                    {!! BootForm::textarea('Body', 'body')->helpBlock('What the people see')->id('body-input') !!}

                    {!! BootForm::select('Theme', 'theme_id')->options($themes)->helpBlock('Which theme are we using?') !!}

                    {!! BootForm::checkbox('Active', 'active')->helpBlock('Are we currently showing this page?') !!}
                    
                    <div class="btn-group">
                        {!! BootForm::submit('<i class="fa fa-save"></i> Lets go!')->addClass('btn-primary') !!}

                        <a href="{{ route('scorpio.page.index') }}" class="btn btn-danger">
                            <i class="fa fa-cross"></i>
                            Cancel
                        </a>
                    </div>
                    
                    @push('page-scripts')
                    <script>
                        $(function() {
                            console.log('running...');
                            $('#body-input').summernote({
                                height: 300
                            });
                        });
                    </script>
                    @endpush