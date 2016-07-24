                    {!! BootForm::text('Title', 'title')->helpBlock('Everything needs a title!') !!}

                    {!! BootForm::text('URI', 'uri')->helpBlock('How is the page accessed?') !!}

                    {!! BootForm::textarea('Body', 'body')->helpBlock('What the people see')->id('body-input') !!}

                    {!! BootForm::select('Theme', 'theme_id')->options($themes)->helpBlock('Which theme are we using?') !!}

                    {!! BootForm::checkbox('Active', 'active')->helpBlock('Are we currently showing this page?')->defaultToChecked() !!}
                    
                    <div class="row">
                        <h3>Order</h3>
                        <div class="col-lg-9">
                        {!! BootForm::select('', 'order')->options(['' => '', 'before' => 'Before', 'after' => 'After', 'childOf' => 'Child Of'])->hideLabel() !!}
                        </div>
                        <div class="col-lg-3">
                        {!! BootForm::select('', 'order_page')->options(['' => ''] + $pages->lists('title', 'id')->toArray())->hideLabel() !!}
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-muted">
                            Placement of this page
                        </p>
                    </div>
                    
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