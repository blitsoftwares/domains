@extends('layouts.app')

@section('content')
    <a href="{{ route('domains.index') }}"><button class="btn btn-default">{{ trans('BlitDomains::domains.route-back') }}</button></a>
    <a href="{{ route('permissions.create', [$domain->id]) }}"><button class="btn btn-default">{{ trans('BlitDomains::permissions.new-register') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitDomains::permissions.permissions') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('BlitDomains::permissions.table-header.name') }}</th>
                    <th>{{ trans('BlitDomains::permissions.table-header.description') }}</th>
                    <th>{{ trans('BlitDomains::permissions.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->description }}</td>
                        <td>
                            <form action="{{ route('permissions.destroy',[$domain->id, $obj->id]) }}" method="POST">
                                <div class="btn-group btn-group-sm">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default">{{ trans('BlitDomains::domains.delete') }}</button>
                                    <a href="{{ route('permissions.edit',[$domain->id, $obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitDomains::permissions.edit') }}</button></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $permissions->render() !!}
        </div>
    </div>
@endsection