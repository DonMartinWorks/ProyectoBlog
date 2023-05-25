@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Create a Post') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            <div class="form-group">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter post name')]) !!}

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
                {!! Form::label('category_id', __('Category')) !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">{{ __('Labels') }}</p>
                @foreach ($tags as $tag)
                    <label class="mr-3">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach

                @error('tags')
                    <br />
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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

                @error('status')
                    <br />
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row my-4">
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture" src="https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg"
                            alt="{{ __('Default Image') }}" title="{{ __('Default Image') }}">
                    </div>
                </div>

                <div class="col ml-3">
                    <div class="form-group">
                        {!! Form::label('file', __('Post Image'), ['title' => __('Image to be shown in this post!')]) !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p>
                        {{ __('We accept images in all formats for uploading. Whether its JPEG, PNG, GIF, or any other common image format, you can upload your image as long as it meets the size limit of 1 MB. This allows you to conveniently upload images in the format that works best for you.') }}
                    </p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('extract', __('Extract')) !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                @error('extract')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', __('Post Body')) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center mt-5">
                {!! Form::submit(__('Create Post'), ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            postition: relative;
            padding-bottom: 50%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
