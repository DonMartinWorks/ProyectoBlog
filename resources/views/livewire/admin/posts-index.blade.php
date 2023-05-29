{{-- Este componente usa Bootstrap --}}
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control"
            placeholder="{{ __('If you want find a post, write the name here') }}">
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            {{-- <td>{{ $post->name }}</td> --}}
                            <td>
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    {{ $post->name }}
                                </a>
                            </td>
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-warning btn-sm"
                                    title="{{ __('Edit') }} {{ $post->name }}">{{ __('Edit') }}</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('delete')
                                    <button title="{{ __('Delete') }} {{ $post->name }}" type="submit"
                                        class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="pagination justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    @else
        <div class="card-body">
            <div class="text-center mt-5">
                <strong>{{ __('We do not find any post') }}</strong>
            </div>
        </div>
    @endif
</div>
