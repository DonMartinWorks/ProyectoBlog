<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"
                placeholder="{{ __('If you want find a user, write the name or email here') }}">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td width="10px">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                        title="{{ __('Edit') }} {{ $user->name }}">{{ __('Edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="pagination justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
    </div>
    @else
    <div class="card-body">
        <div class="text-center mt-5">
            <strong>{{ __('We do not find any user') }}</strong>
        </div>
    </div>
    @endif
</div>
