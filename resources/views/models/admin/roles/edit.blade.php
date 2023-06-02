@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{ __('Update Role') }}: {{ $role->name }}</h1>
@stop

@section('content')
    <p>{{ __('Welcome to the admin panel.') }}</p>
@stop
