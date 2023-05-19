@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Category List') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header mb-4">
            <a class="btn btn-primary btn-md"
                href="{{ route('admin.categories.create') }}">{{ __('Create a new category') }}</a>
        </div>

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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>

                            <td>{{ $category->name }}</td>

                            <td width="10px" class="text-center">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm"
                                    title="{{ __('Edit') }} {{ $category->name }}">{{ __('Edit') }}</a>
                            </td>

                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button title="{{ __('Delete') }} {{ $category->name }}" type="submit"
                                        class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
