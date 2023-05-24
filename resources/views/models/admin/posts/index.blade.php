@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <a class="btn btn-primary btn-md float-right"
        href="{{ route('admin.posts.create') }}">{{ __('Create a new Post') }}</a> --}}
    <h1>{{ __('Post Details') }}</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
