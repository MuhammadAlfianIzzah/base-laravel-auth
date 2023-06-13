<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Welcome Back</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, deleniti.</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card mb-3 py-3 px-4" style="border: 2px dashed rgba(36, 33, 33,.3)">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>


                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>


                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <div class="d-flex justify-content-end flex-column align-items-end">
                                @if (Route::has('password.request'))
                                    <a class="link-offset-2 link-underline link-underline-opacity-0 fw-bold mb-2"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
