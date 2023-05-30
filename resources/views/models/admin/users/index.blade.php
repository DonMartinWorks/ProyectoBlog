@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Users Dashboard') }}</h1>
@stop

@section('content')
    @include('models.partials.message')

    @livewire('admin.users-index')
@stop
