@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Asign Role to the user') }}: {{ $user->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h4">{{ __('Name') }}</p>
            <p class="form-control">{{ $user->name }}</p>

            <p class="h5 pt-4">{{ __('role listing') }}</p>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            <div class="text-center mt-5">
                {!! Form::submit(__('Asign Role'), ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
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
@stop --}}

{{-- @section('js')
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
@endsection --}}
