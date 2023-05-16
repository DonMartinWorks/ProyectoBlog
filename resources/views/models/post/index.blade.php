<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article
                    class="w-full h-80 bg-cover bg-center
                    @if ($loop->first) col-span-2 @endif"
                    style="background-image: url({{ Storage::url($post->image->url) }})">

                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href=""
                                    class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-md">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        <span class="text-3xl text-white leading-8 font-bold drop-shadow-xl">
                            <a href="">{{ $post->name }}</a>
                        </span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
