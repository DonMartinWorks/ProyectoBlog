<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter category name')]) !!}

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
