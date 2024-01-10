<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900">Welcome Back</h1>
                            <p class="text-gray-800">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus,
                                deleniti.</p>
                        </div>
                        <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address"
                                    value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" value="{{ old('password') }}">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block w-100">
                                {{ __('Log in') }}
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">Forgot your password?</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
