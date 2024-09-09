@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <img class="mx-auto w-20 border-4 rounded-full border-green-500" src="{{ asset('images/logo/logo.png') }}" alt="Lore Kid Entrepreneurship">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __('Ready to Start Your Own Adventure?') }}</h2>
        <p class="mt-2 text-center text-sm text-gray-500">{{ __('Join the Kidpreneur club and make your big idea come to life!') }}</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-lg">
        <div class="bg-white p-8 rounded-md shadow-md">
            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm font-medium text-yellow-800 rounded-lg shadow bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400" role="alert">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span>You have <span class="font-bold underline">{{ $errors->count() }} {{ $errors->count() == 1 ? 'area' : 'areas' }}</span> that {{ $errors->count() == 1 ? 'needs' : 'need' }} your attention.</span>
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Section 1: Child's Information -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Child\'s Information') }}</h3>

                <div>
                    <label for="child_name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Full Name of Child') }}</label>
                    <div class="mt-2">
                        <input id="child_name" name="child_name" type="text" value="{{ old('child_name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('child_name')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="age" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Age') }}</label>
                        <div class="mt-2">
                            <input id="age" name="age" type="number" value="{{ old('age') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            @error('age')
                                <span class="text-red-600 text-xs mt-2 block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Gender') }}</label>
                        <div class="mt-2">
                            <select id="gender" name="gender" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                                <option value="">{{ __('Select Gender') }}</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                            </select>
                            @error('gender')
                                <span class="text-red-600 text-xs mt-2 block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div>
                    <label for="dob" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Date of Birth') }}</label>
                    <div class="mt-2">
                        <input id="dob" name="dob" type="date" value="{{ old('dob') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('dob')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="school_name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('School Name') }}</label>
                    <div class="mt-2">
                        <input id="school_name" name="school_name" type="text" value="{{ old('school_name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('school_name')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="year_level" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Std/Year Level') }}</label>
                    <div class="mt-2">
                        <select id="year_level" name="year_level" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                            <option value="" disabled {{ old('year_level') === null ? 'selected' : '' }}>{{ __('Select Year Level') }}</option>
                            <option value="Standard 1" {{ old('year_level') == 'Standard 1' ? 'selected' : '' }}>{{ __('Standard 1') }}</option>
                            <option value="Standard 2" {{ old('year_level') == 'Standard 2' ? 'selected' : '' }}>{{ __('Standard 2') }}</option>
                            <option value="Standard 3" {{ old('year_level') == 'Standard 3' ? 'selected' : '' }}>{{ __('Standard 3') }}</option>
                            <option value="Standard 4" {{ old('year_level') == 'Standard 4' ? 'selected' : '' }}>{{ __('Standard 4') }}</option>
                            <option value="Standard 5" {{ old('year_level') == 'Standard 5' ? 'selected' : '' }}>{{ __('Standard 5') }}</option>
                            <option value="Standard 6" {{ old('year_level') == 'Standard 6' ? 'selected' : '' }}>{{ __('Standard 6') }}</option>
                            <option value="Standard 7" {{ old('year_level') == 'Standard 7' ? 'selected' : '' }}>{{ __('Standard 7') }}</option>
                            <option value="Form 1" {{ old('year_level') == 'Form 1' ? 'selected' : '' }}>{{ __('Form 1') }}</option>
                            <option value="Form 2" {{ old('year_level') == 'Form 2' ? 'selected' : '' }}>{{ __('Form 2') }}</option>
                            <option value="Form 3" {{ old('year_level') == 'Form 3' ? 'selected' : '' }}>{{ __('Form 3') }}</option>
                            <option value="Form 4" {{ old('year_level') == 'Form 4' ? 'selected' : '' }}>{{ __('Form 4') }}</option>
                            <option value="Form 5" {{ old('year_level') == 'Form 5' ? 'selected' : '' }}>{{ __('Form 5') }}</option>
                            <option value="Form 6" {{ old('year_level') == 'Form 6' ? 'selected' : '' }}>{{ __('Form 6') }}</option>
                            <option value="other" {{ old('year_level') == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                        </select>
                        @error('year_level')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="allergies" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Allergies (if any)') }}</label>
                    <div class="mt-2">
                        <textarea id="allergies" name="allergies" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('allergies') }}</textarea>
                        @error('allergies')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 2: Parent/Guardian Information -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Parent/Guardian Information') }}</h3>

                <div>
                    <label for="guardian_name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Parent/Guardian Name') }}</label>
                    <div class="mt-2">
                        <input id="guardian_name" name="guardian_name" type="text" value="{{ old('guardian_name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('guardian_name')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="guardian_phone" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Guardian Phone Number') }}</label>
                    <input id="guardian_phone" type="tel" value="{{ old('guardian_phone') }}" required class="phone block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" />
                    @error('guardian_phone')
                        <span class="text-red-600 text-xs mt-2 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="guardian_email" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Parent/Guardian Email Address') }}</label>
                    <div class="mt-2">
                        <input id="guardian_email" name="guardian_email" type="email" value="{{ old('guardian_email') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('guardian_email')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Address') }}</label>
                    <div class="mt-2">
                        <input id="address" name="address" type="text" value="{{ old('address') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('address')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">{{ __('City/Town/Village') }}</label>
                    <div class="mt-2">
                        <input id="city" name="city" type="text" value="{{ old('city') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('city')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 3: Emergency Contact Information -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Emergency Contact Information') }}</h3>

                <div>
                    <label for="emergency_contact_name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Emergency Contact Name') }}</label>
                    <div class="mt-2">
                        <input id="emergency_contact_name" name="emergency_contact_name" type="text" value="{{ old('emergency_contact_name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('emergency_contact_name')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="emergency_phone" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Guardian Phone Number') }}</label>
                    <input id="emergency_phone" type="tel" value="{{ old('emergency_phone') }}" required class="phone block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" />
                    @error('emergency_phone')
                        <span class="text-red-600 text-xs mt-2 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="relationship" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Relationship to Child') }}</label>
                    <div class="mt-2">
                        <input id="relationship" name="relationship" type="text" value="{{ old('relationship') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('relationship')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 4: Entrepreneurial Interests -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Entrepreneurial Interests') }}</h3>

                <div>
                    <label for="inspiration" class="block text-sm font-medium leading-6 text-gray-900">{{ __('What inspired you to join Lore Kid Entrepreneurship?') }}</label>
                    <div class="mt-2">
                        <textarea id="inspiration" name="inspiration" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('inspiration') }}</textarea>
                        @error('inspiration')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="previous_business" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Have you ever started a business or sold products/services before? (Provide details)') }}</label>
                    <div class="mt-2">
                        <textarea id="previous_business" name="previous_business" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('previous_business') }}</textarea>
                        @error('previous_business')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="hobbies" class="block text-sm font-medium leading-6 text-gray-900">{{ __('What are your interests or hobbies?') }}</label>
                    <div class="mt-2">
                        <input id="hobbies" name="hobbies" type="text" value="{{ old('hobbies') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('hobbies')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="business_idea" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Do you have any specific business ideas or projects you would like to explore?') }}</label>
                    <div class="mt-2">
                        <textarea id="business_idea" name="business_idea" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('business_idea') }}</textarea>
                        @error('business_idea')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="favorite_subject" class="block text-sm font-medium leading-6 text-gray-900">{{ __('What is your favorite subject?') }}</label>
                    <div class="mt-2">
                        <input id="favorite_subject" name="favorite_subject" type="text" value="{{ old('favorite_subject') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('favorite_subject')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 5: Aspirations -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Aspirations') }}</h3>

                <div>
                    <label for="aspiration" class="block text-sm font-medium leading-6 text-gray-900">{{ __('What do you want to be when you grow up?') }}</label>
                    <div class="mt-2">
                        <input id="aspiration" name="aspiration" type="text" value="{{ old('aspiration') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('aspiration')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 6: Parent/Guardian Consent -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Parent/Guardian Consent') }}</h3>

                <div>
                    <div class="flex items-top bg-green-50 border border-dashed border-green-300 rounded-md p-4">
                        <input id="guardian_consent" name="guardian_consent" type="checkbox"
                            {{ old('guardian_consent', false) ? 'checked' : '' }}
                            required
                            class="h-4 w-4 mt-1 rounded border-gray-300 text-green-600 focus:ring-green-600">
                        <label for="guardian_consent" class="ml-3 block text-sm text-justify text-gray-900">
                            {{ __('I confirm that I am the parent or legal guardian of the child named above. I give my consent for my child to participate in Lore Kid Entrepreneurship activities and agree to support them in their entrepreneurial journey. I understand that my contact information provided above will be used for communication purposes related to Lore Kid Entrepreneurship activities.') }}
                        </label>
                    </div>
                    @error('guardian_consent')
                        <span class="text-red-600 text-xs mt-2 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <!-- Section 7: Account Information -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __('Account Information') }}</h3>
                <p class="text-sm text-gray-500">{{ __('Please provide a valid email address and create a secure password for your account. This information will be used to log in to your account and manage your participation in Lore Kid Entrepreneurship. Ensure your password is strong and unique to keep your account secure.') }}</p>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email Address') }}</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="username" value="{{ old('email') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('email')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Password') }}</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('password')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Confirm Password') }}</label>
                    <div class="mt-2">
                        <input id="password_confirmation" name="password_confirmation" autocomplete="new-password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                        @error('password_confirmation')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
