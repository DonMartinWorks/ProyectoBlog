<x-app-layout>
    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h2 class="mb-12 uppercase text-center text-4xl">{{ __('Category') }}: <span
                class="font-extrabold capitalize font-italic">{{ $category->name }}</span>
        </h2>

        @foreach ($posts as $post)
            <article
                class="mb-8  bg-white border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 shadow-lg rounded-md">
                <img class="w-full h-72 object-cover object-center border-b-2 border-gray-400"
                    src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">

                <div class="px-6 mb-8 mt-4">
                    <h2 class="font-bold text-xl mb-2">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                    </h2>

                    <div class="px-4 font-semibold text-gray-500 text-base">{{ $post->extract }}</div>

                    <div class="px-6 pt-4 pb-2">
                        <div class="text-center pt-3">
                            @foreach ($post->tags as $tag)
                                <a href=""
                                    class="px-3 py-1 inline-block text-white bg-{{ $tag->color }}-600 border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 rounded-md capitalize text-center mr-2">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
