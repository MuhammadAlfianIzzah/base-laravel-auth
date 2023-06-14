<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="current_password" name="current_password" class="form-control" id="current_password"
                value="{{ old('current_password') }}">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password_confirmation" name="password_confirmation" class="form-control"
                id="password_confirmation" value="{{ old('password_confirmation') }}">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <div class="text-primary mt-2 text-small" role="alert">
                    {{ __('Saved.') }}
                </div>
            @endif
        </div>
    </form>
</section>
