@extends('layouts.app')

@section('content')
    <a href="{{ route('domains.index') }}"><button class="btn btn-default">{{ trans('BlitDomains::domains.route-back') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitDomains::domains.domains') }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('domains.update',$domain->id) }}">

                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group col-md-9">
                    <label for="name" class="control-label">{{ trans('BlitDomains::domains.fields.name') }}*</label>
                    <input id="name" name="name" type="text" class="form-control"  value="{{ $domain->name }}" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="active" class="col-md-4 control-label">
                        {{ trans('BlitDomains::domains.fields.active') }}
                        <input type="checkbox" id="active" name="active" value="1" @if($domain->active) checked @endif>
                    </label>

                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('BlitDomains::domains.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection