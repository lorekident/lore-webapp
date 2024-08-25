<x-guest-layout>
    <section class="login-content d-flex justify-content-center bg-light align-items-center"
        style="width:100vw;">
        <div class="card shadow col-lg-5 col-xl-5 col-sm-12">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{ asset('images/brands/LORE_LOGO.png') }}" class="img-fluid gradient-main p-0 m-0"
                            style="width:10em" alt="images">
                    </div>
                    <div class="text-center text-primary fw-bold py-3 h6">LORE KID ENTERPRENEURSHIP SYSTEM</div>
                    <div class="text-center fs-9 mb-2 fw-bold">Create an Account</div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('auth.register') }}" data-toggle="validator">
                        {{ csrf_field() }}

                        {{-- Child's Information --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="child_name" class="form-label fw-bold text-muted">Full Name of Child</label>
                                    <input id="child_name" type="text" name="child_name" value="" class="form-control fw-bold bg-light" placeholder="Full Name of Child" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group py-2">
                                    <label for="age" class="form-label fw-bold text-muted">Age</label>
                                    <input id="age" type="number" name="age" value="" class="form-control fw-bold bg-light" placeholder="Age" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group py-2">
                                    <label for="gender" class="form-label fw-bold text-muted">Gender</label>
                                    <select id="gender" name="gender" class="form-control fw-bold bg-light" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="dob" class="form-label fw-bold text-muted">Date of Birth</label>
                                    <input id="dob" type="date" name="dob" value="" class="form-control fw-bold bg-light" placeholder="Date of Birth" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="school_name" class="form-label fw-bold text-muted">School Name</label>
                                    <input id="school_name" type="text" name="school_name" value="" class="form-control fw-bold bg-light" placeholder="School Name" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="std_year" class="form-label fw-bold text-muted">Standard/Year Level</label>
                                    <input id="std_year" type="text" name="std_year" value="" class="form-control fw-bold bg-light" placeholder="Standard/Year Level" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="allergies" class="form-label fw-bold text-muted">Allergies</label>
                                    <input id="allergies" type="text" name="allergies" value="" class="form-control fw-bold bg-light" placeholder="Allergies">
                                </div>
                            </div>
                        </div>

                        {{-- Parent/Guardian Information --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="parent_name" class="form-label fw-bold text-muted">Parent/Guardian Name</label>
                                    <input id="parent_name" type="text" name="parent_name" value="" class="form-control fw-bold bg-light" placeholder="Parent/Guardian Name" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="parent_contact" class="form-label fw-bold text-muted">Parent/Guardian Contact Number</label>
                                    <input id="parent_contact" type="tel" name="parent_contact" value="" class="form-control fw-bold bg-light" placeholder="Parent/Guardian Contact Number" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="parent_email" class="form-label fw-bold text-muted">Parent/Guardian Email Address</label>
                                    <input id="parent_email" type="email" name="parent_email" value="" class="form-control fw-bold bg-light" placeholder="Parent/Guardian Email Address" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="address" class="form-label fw-bold text-muted">Address</label>
                                    <input id="address" type="text" name="address" value="" class="form-control fw-bold bg-light" placeholder="Address" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="city" class="form-label fw-bold text-muted">City/Town/Village</label>
                                    <input id="city" type="text" name="city" value="" class="form-control fw-bold bg-light" placeholder="City/Town/Village" required>
                                </div>
                            </div>
                        </div>

                        {{-- Emergency Contact Information --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="emergency_contact_name" class="form-label fw-bold text-muted">Emergency Contact Name</label>
                                    <input id="emergency_contact_name" type="text" name="emergency_contact_name" value="" class="form-control fw-bold bg-light" placeholder="Emergency Contact Name" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="relationship" class="form-label fw-bold text-muted">Relationship to Child</label>
                                    <input id="relationship" type="text" name="relationship" value="" class="form-control fw-bold bg-light" placeholder="Relationship to Child" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group py-2">
                                    <label for="emergency_contact_phone" class="form-label fw-bold text-muted">Emergency Contact Phone Number</label>
                                    <input id="emergency_contact_phone" type="tel" name="emergency_contact_phone" value="" class="form-control fw-bold bg-light" placeholder="Emergency Contact Phone Number" required>
                                </div>
                            </div>
                        </div>

                        {{-- Entrepreneurial Interests --}}
                        <div class="form-group py-2">
                            <label for="inspiration" class="form-label fw-bold text-muted">What inspired you to join Lore Kid Entrepreneurship?</label>
                            <textarea id="inspiration" name="inspiration" class="form-control fw-bold bg-light" rows="3" placeholder="What inspired you to join Lore Kid Entrepreneurship?" required></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="business_experience" class="form-label fw-bold text-muted">Have you ever started a business or sold products/services before? If yes, please provide details.</label>
                            <textarea id="business_experience" name="business_experience" class="form-control fw-bold bg-light" rows="3" placeholder="Provide details if you have started a business or sold products/services before"></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="hobbies" class="form-label fw-bold text-muted">What are your interests or hobbies?</label>
                            <textarea id="hobbies" name="hobbies" class="form-control fw-bold bg-light" rows="3" placeholder="What are your interests or hobbies?" required></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="business_ideas" class="form-label fw-bold text-muted">Do you have any specific business ideas or projects you would like to explore?</label>
                            <textarea id="business_ideas" name="business_ideas" class="form-control fw-bold bg-light" rows="3" placeholder="Any specific business ideas or projects you would like to explore?"></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="subjects" class="form-label fw-bold text-muted">What Subjects do you do at School?</label>
                            <textarea id="subjects" name="subjects" class="form-control fw-bold bg-light" rows="3" placeholder="What Subjects do you do at School?" required></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="favourite_subject" class="form-label fw-bold text-muted">What is your favourite Subject?</label>
                            <input id="favourite_subject" type="text" name="favourite_subject" value="" class="form-control fw-bold bg-light" placeholder="What is your favourite Subject?" required>
                        </div>

                        <div class="form-group py-2">
                            <label for="future_aspirations" class="form-label fw-bold text-muted">What do you want to be when you grow up?</label>
                            <input id="future_aspirations" type="text" name="future_aspirations" value="" class="form-control fw-bold bg-light" placeholder="What do you want to be when you grow up?" required>
                        </div>

                        {{-- Parent/Guardian Consent --}}
                        <div class="form-group py-2">
                            <label for="consent" class="form-label fw-bold text-muted">Parent/Guardian Consent</label>
                            <textarea id="consent" name="consent" class="form-control fw-bold bg-light" rows="3" placeholder="Enter Parent/Guardian Name for Consent" required></textarea>
                        </div>

                        <div class="form-group py-2">
                            <label for="consent_date" class="form-label fw-bold text-muted">Date</label>
                            <input id="consent_date" type="date" name="consent_date" value="" class="form-control fw-bold bg-light" required>
                        </div>

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
                            <div class="form-group py-2">
                                <label for="password" class="form-label fw-bold text-muted">Confirm Password</label>
                                <input class="form-control fw-bold bg-light" type="password" placeholder="Confirm Password" name="confirm_password"
                                    value="" required autocomplete="current-password">
                            </div>
                        </div>

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="d-flex justify-content-center mb-4">
                            <button type="submit" id="login_btn" class="btn w-100 btn-primary fw-bold">{{ __('Sign up') }}</button>
                            <button class="btn btn-dark w-100 fw-bold" style="display: none;" id="attempt_btn" type="button" disabled>
                                Attempting to create account...
                            </button>
                        </div>

                        <p class="mt-3 text-center text-dark">
                            Already have an account? <a href="{{ route('auth.signin') }}" class="text-underline text-primary">Click here to sign in.</a>
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
