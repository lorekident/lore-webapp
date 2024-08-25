<x-guest-layout>
    <section class="login-content d-flex justify-content-center bg-light align-items-center"
        style="height: 100vh; width:100vw;">
        <div class="card shadow col-lg-5 col-xl-5 col-sm-12">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('images/brands/LORE_LOGO.png') }}" class="img-fluid gradient-main p-0 m-0"
                            style="width:10em" alt="images">
                    </div>
                    <div class="text-center text-primary fw-bold py-3 h6">LORE KID ENTERPRENEURSHIP SYSTEM</div>
                    <div class="text-center fs-9 mb-2 fw-bold">Login To Continue</div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('login') }}" data-toggle="validator">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="email" class="form-label fw-bold text-muted">Email</label>
                                    <input id="email" type="email" name="email" value=""
                                        class="form-control fw-bold bg-light" placeholder="Email address" required autofocus>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="password" class="form-label fw-bold text-muted">Password</label>
                                    <input class="form-control fw-bold bg-light" type="password" placeholder="Password" name="password"
                                        value="" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="{{ route('auth.recoverpw') }}" class="float-end mb-3 fw-bold text-primary">Forgot
                                    Password?</a>
                            </div>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="d-flex justify-content-center mb-4">
                            <button type="submit" id="login_btn"
                                class="btn w-100 btn-primary fw-bold">{{ __('Sign In') }}</button>
                            <button class="btn btn-dark w-100 fw-bold" style="display: none;" id="attempt_btn"
                                type="button" disabled>
                                Attempting to login...
                            </button>
                        </div>

                        <p class="mt-3 text-center text-dark">
                            Don’t have an account? <a href="{{ route('auth.signup') }}"
                                class="text-underline text-primary">Click here to sign up.</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="text-white">
            LORE KID ENTERPRENEURSHIP SYSTEM
        </div> --}}
    </section>

</x-guest-layout>
