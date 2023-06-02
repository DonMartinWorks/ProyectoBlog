@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-primary btn-md float-right" href="{{ route('admin.roles.create') }}">{{ __('Create a new Role') }}</a>
    <h1>{{ __('Role Details') }}</h1>
@stop

@section('content')
@include('models.partials.message')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                {{-- @can('admin.role.edit') --}}
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-warning btn-sm"
                                    title="{{ __('Edit') }} {{ $role->name }}"">{{ __('Edit') }}</a>
                                {{-- @endcan --}}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.role.destroy') --}}
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this role?');">
                                    @csrf
                                    @method('delete')
                                    <button title="{{ __('Delete') }} {{ $role->name }}" type="submit"
                                        class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
