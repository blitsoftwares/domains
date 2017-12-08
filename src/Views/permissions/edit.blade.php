@extends('layouts.app')

@section('content')

    <a href="{{ route('permissions.index', [$domain->id]) }}"><button class="btn btn-default">{{ trans('BlitDomains::permissions.route-back') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitDomains::permissions.permissions') }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('permissions.update',[$domain->id, $permission->id]) }}">

                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">{{ $domain->name }}. <span style="color: red;">*</span> </label>
                    <div class="col-md-2">
                        <input id="name" name="name" type="text" class="form-control" value="{{explode('.',$permission->name)[1]}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">{{ trans('BlitDomains::permissions.fields.description') }}</label>
                    <div class="col-md-2">
                        <input id="description" name="description" type="text" class="form-control" value="{{ $permission->description }}" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('BlitDomains::permissions.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection