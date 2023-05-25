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
            @isset ($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg"
                    alt="{{ __('Default Image') }}" title="{{ __('Default Image') }}">
            @endisset
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
