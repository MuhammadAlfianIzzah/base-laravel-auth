<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900">Forgot Your Password?</h1>
                            <p class="mb-4">No problem. Just let us know your email address, and we will email you a
                                password reset link that will allow you to choose a new one.</p>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}" class="user">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block w-100">
                                Email Password Reset Link
                            </button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}" class="small">Create an Account!</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="small">Already have an account? Login!</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
