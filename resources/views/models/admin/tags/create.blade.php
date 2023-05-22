@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Create Tag') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
            <div class="form-group">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter tag name')]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', __('Slug')) !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}


                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('color', __('Color')) !!}
                {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

                @error('color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center mt-5">
                {!! Form::submit(__('Create tag'), ['class' => 'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
