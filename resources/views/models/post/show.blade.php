<x-app-layout>
    <div class="container py-8">
        <h1 class="py-4 text-5xl font-bold text-gray-700 uppercase text-center">{{ $post->name }}</h1>

        <div class="mt-4 text-lg text-gray-600 mb-5 mx-5">
            {{ $post->extract }}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Principal Content -->
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 lg:h-96 object-cover object-center border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400"
                        src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">
                </figure>

                <div class="lg:my-7 sm:my-9 my-5 mx-2 text-base text-gray-800">
                    {{ $post->body }}
                </div>
            </div>

            <!-- Related Content -->
            <aside class="lg:ml-3">
                <h2 class="text-2xl font-bold text-gray-500 mb-4">{{ __('See More') }}: {{ $post->category->name }}</h2>

                <ul>
                    @foreach ($relateds as $related)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $related) }}">
                                <img class="lg:w-24 w-36 h-20 object-cover object-center"
                                    src="{{ Storage::url($related->image->url) }}" alt="{{ $post->name }}">

                                <span class="ml-2 text-gray-400">{{ $related->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
