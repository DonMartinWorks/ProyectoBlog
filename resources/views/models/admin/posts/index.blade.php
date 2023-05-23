@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{ __('Post Details') }}</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
