@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Create a Post') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}
            <div class="form-group">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter post name')]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug', __('Slug')) !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', __('Category')) !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <p class="font-weight-bold">{{ __('Labels') }}</p>
                @foreach ($tags as $tag)
                    <label class="mr-3">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>

            <div class="form-group">
                <p class="font-weight-bold">{{ __('Post Status') }}</p>
                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    {{ __('Draft Post') }}
                </label>

                <label class="ml-2">
                    {!! Form::radio('status', 2) !!}
                    {{ __('Published Post') }}
                </label>

            </div>

            <div class="form-group">
                {!! Form::label('extract', __('Extract')) !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', __('Post Body')) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>

            <div class="text-center mt-5">
                {!! Form::submit(__('Create Post'), ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
