@extends('layouts.app')

@section('css')
    <style>
        table.dataTable thead tr {
            background-color: #017aaf;
        }

        table.dataTable tr.odd { background-color: #E2E4FF; }
        table.dataTable tr.even { background-color: white; }
    </style>
@endsection


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left" style="padding-top: 7.5px; font-weight: 700;">@lang('models/user.titles.header')</h4>
            <div class="input-group pull-right">
                <a href="{{ route('users.create') }}" class="btn btn-info btn-circle open-modal">&nbsp;@lang('models/user.action.add')</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12 col-xs-12 table-responsive">
                {!! $table->table() !!}
            </div>
        </div>
    </div>

@endsection

@section('js')

    {!! $table->scripts() !!}


@endsection
