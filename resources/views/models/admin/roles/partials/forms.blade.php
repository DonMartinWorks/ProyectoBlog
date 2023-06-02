<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter role name')]) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<h3>{{ __('Permissions List') }}</h3>

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach
