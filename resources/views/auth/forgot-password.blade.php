<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Welcome Back</h1>
                <p class="text-center">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card mb-3 py-3 px-4" style="border: 2px dashed rgba(36, 33, 33,.3)">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="d-flex justify-content-end flex-column align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
