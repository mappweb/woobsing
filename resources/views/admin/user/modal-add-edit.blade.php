{!! Form::open(['class' => 'floating-labels crud_ajax', 'url' => $user->exists? route('users.update', ['user' => $user->id]) : route('users.store'), 'method' => $user->exists? 'PUT' : 'POST']) !!}

    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                @if($user->exists)
                    <h4 class="modal-title" id="myLargeModalLabel">@lang('models/user.action.edit')  - {{ $user->full_name }}</h4>
                @else
                    <h4 class="modal-title" id="myLargeModalLabel">@lang('models/user.action.add')</h4>
                @endif

            </div>
            <div class="modal-body">

                <div class="row">
                    <!-- START REPEAT THIS COL -->
                     <div class="col-md-6">
                        <div class="form-group m-b-40 focused" data-feedback="first_name">
                            {!! Form::label('first_name', __('models/user.fillable.first_name')) !!}
                            {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                            <p class="help-block" data-feedback="first_name"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group m-b-40 focused" data-feedback="last_name">
                            {!! Form::label('last_name', __('models/user.fillable.last_name')) !!}
                            {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                            <p class="help-block" data-feedback="last_name"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group m-b-40 focused" data-feedback="phone">
                            {!! Form::label('phone', __('models/user.fillable.phone')) !!}
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                            <p class="help-block" data-feedback="phone"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group m-b-40 focused" data-feedback="email">
                            {!! Form::label('email', __('models/user.fillable.email')) !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                            <p class="help-block" data-feedback="email"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group m-b-40 focused" data-feedback="address">
                            {!! Form::label('address', __('models/user.fillable.address')) !!}
                            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                            <p class="help-block" data-feedback="address"></p>
                        </div>
                    </div>
                    <!-- END REPEAT THIS COL -->
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::button(__('global.actions.close'), ['class' => 'btn btn-danger waves-effect text-left', 'data-dismiss' => 'modal']) !!}
                <button type="submit" class="btn btn-primary waves-effect text-left">&nbsp;@lang('global.actions.save')</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function () {
    });
</script>
