@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Permissions</div>
                <div class="card-body">
                    <a href="{{ url('/permissions/create') }}" class="btn btn-success btn-sm" title="Add New Permission">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td><a href="{{ url('/permissions', $permission->id) }}">{{ $permission->name }}</a></td>
                                    <td>
                                        <a href="{{ url('/permissions/' . $permission->id . '/edit') }}" title="Edit Permission"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/permissions', $permission->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $permissions->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection