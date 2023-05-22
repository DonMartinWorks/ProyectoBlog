@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-primary btn-md float-right" href="{{ route('admin.tags.create') }}">{{ __('Create a new Tag') }}</a>

    <h1>{{ __('Tag List') }}</h1>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.tags.edit', $tag->slug) }}" class="btn btn-warning btn-sm"
                                    title="{{ __('Edit') }} {{ $tag->name }}"">{{ __('Edit') }}</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                    @csrf
                                    @method('delete')
                                    <button title="{{ __('Delete') }} {{ $tag->name }}" type="submit"
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
