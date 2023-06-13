<x-guest-layout>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Create Your Account</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, deleniti.</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card mb-3 py-3 px-4" style="border: 2px dashed rgba(36, 33, 33,.3)">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

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


                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">password_confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" value="{{ old('password_confirmation') }}">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="d-flex justify-content-end flex-column align-items-end">
                                <a class="link-offset-2 link-underline link-underline-opacity-0 mb-2"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
