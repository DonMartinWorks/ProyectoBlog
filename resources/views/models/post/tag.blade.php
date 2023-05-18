<x-app-layout>
    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h2 class="mb-12 uppercase text-center text-4xl">{{ __('Label') }}: <span
                class="font-extrabold capitalize font-italic">{{ $tag->name }}</span>
        </h2>

        @foreach ($posts as $post)
            <x-card-post :post="$post" />
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
