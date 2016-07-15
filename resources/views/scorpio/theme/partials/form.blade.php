                    {!! BootForm::text('Name', 'name')->helpBlock('Everything needs a name!') !!}

                    <div class="btn-group">
                        {!! BootForm::submit('<i class="fa fa-save"></i> Lets go!')->addClass('btn-primary') !!}

                        <a href="{{ route('scorpio.theme.index') }}" class="btn btn-danger">
                            <i class="fa fa-cross"></i>
                            Cancel
                        </a>
                    </div>