{!! Form::open(['class' => 'floating-labels delete-ajax', 'url' => route('users.destroy', ['user' => $user->id])]) !!}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">@lang('models/user.action.destroy') - {{ $user->full_name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-danger">@lang('global.messages.confirm_delete', ['label' => $user->full_name ])</h4>
            </div>
            <div class="modal-footer">
                {!! Form::button(__('global.actions.yes'), ['class' => 'btn btn-danger waves-effect text-left', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit(__('generals.actions.no'), ['class' => 'btn btn-primary waves-effect text-left']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
