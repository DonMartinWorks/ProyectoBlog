@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Category List') }}</h1>
@stop

@section('content')
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm"
                                    title="{{ __('Edit') }} {{ $category->name }}">{{ __('Edit') }}</a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
