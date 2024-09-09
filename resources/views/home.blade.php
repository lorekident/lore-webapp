@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Main Content -->
        <div class="col-span-2 bg-white shadow-md rounded-lg p-6">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-green-700">
                    <span>✨</span>
                    <span class="mx-2">{{ __('Welcome Back!') }}</span>
                    <span>💡</span>
                </h1>
                <p class="text-gray-600">{{ __('Time to Shine and Build Your Dream!') }}</p>
            </div>

            <!-- Profile Section -->
            <div class="space-y-6">
                <!-- Personal Information -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">👤</span>
                        <h2 class="text-xl font-semibold text-green-500">Personal Information</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Child's Name:</strong> {{ $profile->child_name }}</p>
                        <p><strong>Age:</strong> {{ $profile->age }}</p>
                        <p><strong>Gender:</strong> {{ $profile->gender }}</p>
                        <p><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($profile->dob)->format('F j, Y') }}</p>
                    </div>
                </div>

                <!-- School Information -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">🏫</span>
                        <h2 class="text-xl font-semibold text-green-600">School Information</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>School Name:</strong> {{ $profile->school_name }}</p>
                        <p><strong>Year Level:</strong> {{ $profile->year_level }}</p>
                    </div>
                </div>

                <!-- Guardian Information -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">🛡️</span>
                        <h2 class="text-xl font-semibold text-green-600">Guardian Information</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Guardian Name:</strong> {{ $profile->guardian_name }}</p>
                        <p><strong>Guardian Phone:</strong> {{ $profile->guardian_phone }}</p>
                        <p><strong>Guardian Email:</strong> {{ $profile->guardian_email }}</p>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">🏠</span>
                        <h2 class="text-xl font-semibold text-green-600">Address Information</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Address:</strong> {{ $profile->address }}</p>
                        <p><strong>City:</strong> {{ $profile->city }}</p>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">🚨</span>
                        <h2 class="text-xl font-semibold text-green-600">Emergency Contact</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Emergency Contact Name:</strong> {{ $profile->emergency_contact_name }}</p>
                        <p><strong>Emergency Phone:</strong> {{ $profile->emergency_phone }}</p>
                        <p><strong>Relationship:</strong> {{ $profile->relationship }}</p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-gray-50 border border-dashed p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105 hover:bg-gray-100 cursor-pointer duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-3">ℹ️</span>
                        <h2 class="text-xl font-semibold text-green-600">Additional Information</h2>
                    </div>
                    <div class="space-y-2">
                        <p><strong>Inspiration:</strong> {{ $profile->inspiration }}</p>
                        <p><strong>Previous Business:</strong> {{ $profile->previous_business }}</p>
                        <p><strong>Hobbies:</strong> {{ $profile->hobbies }}</p>
                        <p><strong>Business Idea:</strong> {{ $profile->business_idea }}</p>
                        <p><strong>Favorite Subject:</strong> {{ $profile->favorite_subject }}</p>
                        <p><strong>Aspiration:</strong> {{ $profile->aspiration }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right-Hand Column -->
        <div class="col-span-1">

            <!-- Fun Fact Section -->
            <div class="bg-white border border-green-300 rounded-lg p-4 shadow-md hover:bg-green-100 transition duration-300 ease-in-out mb-4">
                <h3 class="text-xl font-semibold text-green-500 mb-3">🧩 Fun Fact of the Day</h3>
                <div id="fun-fact" class="text-md text-green-700 mb-4">
                    <!-- Fun fact will be loaded here -->
                </div>
                <div id="loader" class="text-center my-4 hidden">
                    <div class="flex items-center">
                        <svg class="animate-spin h-6 w-6 mr-2 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4h-4z"></path>
                        </svg>
                        <p class="text-green-500">Loading...</p>
                    </div>
                </div>
                <button id="fetch-fact" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    {{ __('Get a New Fun Fact!') }}
                </button>
            </div>

            <div class="bg-green-50 border border-green-200 rounded-lg p-6 shadow-lg">
                <h2 class="text-2xl font-bold text-green-600 mb-4">🚀 Explore and Learn!</h2>

                <!-- Learning Resources Card -->
                <div class="bg-white border border-green-300 rounded-lg p-4 mb-6 shadow-md hover:bg-green-100 transition duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">📚 Learning Resources</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://www.khanacademy.org" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🎓 Khan Academy - Free Learning Resources</a>
                        </li>
                        <li>
                            <a href="https://www.code.org" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">💻 Code.org - Learn Coding Fun</a>
                        </li>
                        <li>
                            <a href="https://www.brainpop.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🧠 BrainPOP - Educational Videos and Games</a>
                        </li>
                        <li>
                            <a href="https://www.quizzlet.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">📝 Quizlet - Study Tools and Flashcards</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/crashcoursekids" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">📺 Crash Course Kids - Science Made Fun</a>
                        </li>
                    </ul>
                </div>

                <!-- Inspirational Stories Card -->
                <div class="bg-white border border-green-300 rounded-lg p-4 mb-6 shadow-md hover:bg-green-100 transition duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">⭐ Inspirational Stories</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://www.ted.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🎤 TED Talks - Inspiring Stories</a>
                        </li>
                        <li>
                            <a href="https://www.success.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🌟 Success - Stories of Triumph and Success</a>
                        </li>
                        <li>
                            <a href="https://www.inc.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🚀 Inc. - Stories of Entrepreneurial Success</a>
                        </li>
                        <li>
                            <a href="https://www.goalcast.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🏆 Goalcast - Empowering Success Stories</a>
                        </li>
                        <li>
                            <a href="https://www.theverge.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">📰 The Verge - Stories of Innovation</a>
                        </li>
                        <li>
                            <a href="https://www.britannica.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🌍 Britannica - Learn from the Experts</a>
                        </li>
                    </ul>
                </div>

                <!-- Fun Activities Card -->
                <div class="bg-white border border-green-300 rounded-lg p-4 mb-6 shadow-md hover:bg-green-100 transition duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">🎨 Fun Activities</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://www.natgeokids.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🌍 National Geographic Kids - Discover the World</a>
                        </li>
                        <li>
                            <a href="https://www.mathplayground.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🧮 Math Playground - Fun Math Games</a>
                        </li>
                    </ul>
                </div>

                <!-- Entrepreneurship Card -->
                <div class="bg-white border border-green-300 rounded-lg p-4 shadow-md hover:bg-green-100 transition duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">💼 Entrepreneurship</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://www.entrepreneur.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">💡 Entrepreneur - Tips and Resources</a>
                        </li>
                        <li>
                            <a href="https://www.startupnation.com" target="_blank" class="block text-md text-green-700 hover:text-green-900 transition duration-300 hover:underline">🌟 Startup Nation - Start Your Journey</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Fun Facts Card -->
    <div class="flex items-center justify-between bg-white border border-green-300 rounded-lg px-6 py-4 shadow-lg mt-8">
        <div>
            <h2 class="text-2xl font-bold text-green-600 mb-2">🤔 Hungry For Growth?</h2>
            <p id="fun-fact" class="text-gray-700">We have so much more for you, lets start your business <span class="font-bold">Today!</span> <span class="text-4xl">🏋️</span></p>
        </div>
        <div>
            <a href="https://lorekidentrepreneurship.co.za" target="_blank" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                <span class="mr-2">{{ __('Start Your Business') }}</span>
                <span class="text-xl">👊</span>
            </a>
        </div>
    </div>

</div>
@endsection

@pushOnce('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fetchFactButton = document.getElementById('fetch-fact');
    const funFactElement = document.getElementById('fun-fact');
    const loaderElement = document.getElementById('loader');

    fetchFunFact();

    function fetchFunFact() {
        // Show loader and disable button
        loaderElement.classList.remove('hidden');
        fetchFactButton.disabled = true;
        fetchFactButton.classList.add('disabled:bg-gray-300', 'disabled:text-gray-400', 'disabled:font-normal','disabled:cursor-not-allowed'); // Apply disabled styles
        funFactElement.innerHTML = ''; // Clear previous fact

        fetch('https://uselessfacts.jsph.pl/random.json?language=en')
            .then(response => response.json())
            .then(data => {
                // Hide loader and enable button
                loaderElement.classList.add('hidden');
                fetchFactButton.disabled = false;
                fetchFactButton.classList.remove('disabled:bg-gray-300', 'disabled:text-gray-400', 'disabled:font-normal', 'disabled:cursor-not-allowed'); // Remove disabled styles
                funFactElement.textContent = data.text;
            })
            .catch(error => {
                // Hide loader and enable button
                loaderElement.classList.add('hidden');
                fetchFactButton.disabled = false;
                fetchFactButton.classList.remove('disabled:bg-gray-300', 'disabled:text-gray-400', 'disabled:font-normal', 'disabled:cursor-not-allowed'); // Remove disabled styles
                funFactElement.textContent = 'Sorry, I couldn\'t find a fun fact for you';
            });
    }

    fetchFactButton.addEventListener('click', fetchFunFact);
});

</script>
@endPushOnce
