<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article
                    class="w-full h-80 bg-cover bg-center rounded-md border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400
                    @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg @endif)">

                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="mb-1">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"
                                    class="capitalize inline-center py-1 mx-1 px-3 h-6 bg-{{ $tag->color }}-600 border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 text-white text-bold rounded-md justify-center items-center">{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>

                        <span class="text-3xl text-white leading-8 font-bold drop-shadow-xl mt-2">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                        </span>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
