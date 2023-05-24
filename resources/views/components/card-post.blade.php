@props(['post'])

<article class="mb-8  bg-white border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 shadow-lg rounded-md">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center border-b-2 border-gray-400"
            src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">
    @else
        <img class="w-full h-72 object-cover object-center border-b-2 border-gray-400"
            src="https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg" alt="{{ $post->name }}">
    @endif

    <div class="px-6 mb-8 mt-4">
        <h2 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h2>

        <div class="px-4 font-semibold text-gray-500 text-base">{!! $post->extract !!}</div>

        <div class="px-6 pt-4 pb-2">
            <div class="text-center pt-3">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.tag', $tag) }}"
                        class="px-3 py-1 inline-block text-white bg-{{ $tag->color }}-600 border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 rounded-md capitalize text-center mr-2">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</article>
