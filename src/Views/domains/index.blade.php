@extends('layouts.app')

@section('content')
    <a href="{{ route('domains.create') }}"><button class="btn btn-default">{{ trans('BlitDomains::domains.new-register') }}</button></a>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('BlitDomains::domains.domains') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('BlitDomains::domains.table-header.name') }}</th>
                    <th>{{ trans('BlitDomains::domains.table-header.slug') }}</th>
                    <th>{{ trans('BlitDomains::domains.table-header.active') }}</th>
                    <th>{{ trans('BlitDomains::domains.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($domains as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->slug }}</td>
                        <td>{{ $obj->active ? 'Yes': 'No' }}</td>
                        <td>
                            <form action="{{ route('domains.destroy',$obj->id) }}" method="POST">
                                <div class="btn-group btn-group-sm">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default">{{ trans('BlitDomains::domains.delete') }}</button>
                                    <a href="{{ route('domains.edit',[$obj->id]) }}"><button type="button" class="btn btn-sm btn-default">{{ trans('BlitDomains::domains.edit') }}</button></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $domains->render() !!}
        </div>
    </div>
@endsection