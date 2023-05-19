@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Create Category') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter category name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', __('Slug')) !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter category slug']) !!}
            </div>

            <div class="text-center mt-5">
                {!! Form::submit(__('Create category'), ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
