<x-app-layout>
    <div class="container py-8">
        <h1 class="py-4 text-5xl font-bold text-gray-700 uppercase text-center">{{ $post->name }}</h1>

        <div class="mt-4 text-lg text-gray-600 mb-5 mx-5">
            {!! $post->extract !!}
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Principal Content -->
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 lg:h-96 object-cover object-center border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400"
                            src="{{ Storage::url($post->image->url) }}" alt="{{ $post->name }}">
                    @else
                        <img class="w-full h-72 object-cover object-center border-b-2 border-gray-400"
                            src="https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg"
                            alt="{{ $post->name }}">
                    @endif
                </figure>

                <div class="my-6 ml-3 text-lg leading-6">
                    <span class="text-black underline justify-start">{{ __('Writter') }}</span>:
                    {{ $post->user->name }}
                    <span class="justify-end mx-52">
                        <a class="text-purple-700">{{ $post->created_at->format('d/m/Y') }}</a>
                    </span>
                </div>

                <div class="lg:my-7 sm:my-9 my-5 mx-2 text-base text-gray-800">
                    {!! $post->body !!}
                </div>
            </div>

            <!-- Related Content -->
            <aside class="lg:ml-3 bg-white rounded-md border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400">
                <h2 class="text-4xl font-bold text-gray-500 mt-8 text-center">{{ __('See More') }}:
                    {{ $post->category->name }}</h2>

                <ul class="text-center mt-36">
                    <p class="text-xl font-bold text-blue-500 my-4 text-center mx-5">
                        {{ __('We have these related posts that maybe interest you!') }}
                    </p>
                    @foreach ($relateds as $related)
                        <li class="mb-4 mx-5">
                            <a class="hover:bg-gray-100 hover:font-extrabold flex border-t-2 border-b-2 border-l-2 border-r-2 border-gray-400 rounded-md"
                                href="{{ route('posts.show', $related) }}">
                                @if ($related->image)
                                    <img class="lg:w-24 aspect-[16/9] w-36 h-20 border-r-2 border-gray-400 object-cover object-center"
                                        src="{{ Storage::url($related->image->url) }}" alt="{{ $post->name }}">
                                @else
                                    <img class="lg:w-24 aspect-[16/9] w-36 h-20 border-r-2 border-gray-400 object-cover object-center"
                                        src="https://cdn.pixabay.com/photo/2015/09/03/17/50/cobweb-921039_1280.jpg"
                                        alt="{{ $post->name }}">
                                @endif

                                <span class="ml-2 text-purple-500 ">{{ $related->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
