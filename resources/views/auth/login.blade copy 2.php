<x-guest-layout>
    <section class="row login-content d-flex justify-content-center bg-light align-items-center"
         style="background-image: url('{{ asset('images/auth-bg.png') }}'); background-size: cover; background-position: center;height: 100vh; width:100vw;">
        <div class="col lg-6">
<div class="text-center" style="background-image: url('{{ asset('images/Side_Image.png') }}'); background-size: cover; background-position: center;width:100%;">
    <!-- Your other content goes here -->
</div>

        </div>
        <div class="col-lg-6">
                    <div class="card shadow col-lg-10 col-xl-10 col-sm-12" style="background-color: #387EC1;">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('images/brands/LORE_LOGO.png') }}" class="img-fluid gradient-main p-0 m-0"
                            style="width:8em" alt="images">
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

                        {{-- <p class="mt-3 text-center text-dark">
                            Don’t have an account? <a href="{{ route('auth.signup') }}"
                                class="text-underline text-primary">Click here to sign up.</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
        </div>
        {{-- <div class="text-white">
            LORE KID ENTERPRENEURSHIP SYSTEM
        </div> --}}
    </section>

    <section class="login-content d-none">
        <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6 ">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                            <div class="card-body">
                                <a href="{{ route('home') }}"
                                    class="navbar-brand d-flex justify-content-center bg-info align-items-center mb-3">
                                    <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                    </svg>
                                    <h4 class="logo-title ms-3">{{ env('APP_NAME') }}</h4>
                                </a>
                                <div class="text-center d-flex justify-content-center p-2">
                                    <div style="height:100px;">
                                        <img src="{{ asset('images/brands/globe_text.png') }}"
                                            class="img-fluid gradient-main  w-100" alt="images">
                                    </div>
                                </div>

                                <h2 class="mb-2 text-start">Sign In</h2>
                                <p class="text-start">Login to stay connected.</p>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}" data-toggle="validator">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group py-2">
                                                <label for="email" class="form-label">Email</label>
                                                <input id="email" type="email" name="email" value=""
                                                    class="form-control" placeholder="Email address" required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group py-2">
                                                <label for="password" class="form-label text-dark">Password</label>
                                                <input class="form-control" type="password" placeholder="Password"
                                                    name="password" value="" required
                                                    autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{ route('auth.recoverpw') }}"
                                                class="float-end mb-3 text-dark">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="login_btn"
                                            class="btn w-100 btn-primary fw-bold">{{ __('Sign In') }}</button>
                                        <button class="btn btn-dark w-100 fw-bold" style="display: none;"
                                            id="attempt_btn" type="button" disabled>
                                            Attempting to login...
                                        </button>
                                    </div>

                                    <p class="mt-3 text-center text-dark">
                                        Don’t have an account? <a href="{{ route('auth.signup') }}"
                                            class="text-underline text-dark">Click here to sign up.</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg">
                    <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                                transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                                transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none  p-0 vh-100 overflow-hidden">
                <div class="bd-example p-0 m-0 h-100">
                    <div id="carouselExampleCaptions h-100" class="carousel slide" data-bs-ride="carousel">
                        {{-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                    </div> --}}
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/login/1.jpg') }}" width="100" height="100"
                                    class="img-fluid gradient-main animated-scaleX" alt="images">
                            </div>
                            {{-- <div class="carousel-item active">
                            <img src="{{asset('images/login/5.jpg')}}"  width="100" class="img-fluid gradient-main animated-scaleX" alt="images">
                        </div> --}}
                            <div class="carousel-item">
                                <img src="{{ asset('images/login/2.jpg') }}" width="100"
                                    class="img-fluid gradient-main animated-scaleX" alt="images">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/login/3.jpg') }}" width="100"
                                    class="img-fluid gradient-main animated-scaleX" alt="images">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/login/4.jpg') }}" width="100"
                                    class="img-fluid gradient-main animated-scaleX" alt="images">
                            </div>

                            {{-- <div class="carousel-item">
                            <img src="{{asset('images/login/6.jpg')}}"  width="100" class="img-fluid gradient-main animated-scaleX" alt="images">
                        </div> --}}
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('login_btn').addEventListener('click', function() {
                document.getElementById('login_btn').style.display = 'none';
                document.getElementById('attempt_btn').style.display = 'block';
            });
        </script>
    </section>
</x-guest-layout>
