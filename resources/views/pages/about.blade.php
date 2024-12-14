<x-app-layout>
    <!-- About Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 lg:mt-16 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">About</span>
                            <span class="block text-indigo-600">LevelUp Coding</span>
                        </h1>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- About Content -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Meet Your Mentor
                    </h2>
                    <p class="mt-3 text-lg text-gray-500">
                        Hi, I'm Alexander Popov, a coding mentor passionate about guiding young programmers on their journey. I've been coding since I was 9, and my lived experience with Asperger's Syndrome gives me a unique perspective in approaching problem-solving and creativity.
                    </p>
                    <p class="mt-3 text-lg text-gray-500">
                        With over 5 years of professional experience in software development, specializing in game development and web design, I've worked on real-world projects that bring ideas to life. Whether you're just starting out or looking to deepen your skills, I'm here to help you unlock your potential and navigate the exciting world of programming.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="aspect-w-3 aspect-h-2">
                        <img class="object-cover shadow-lg rounded-lg" src="{{ asset('images/about/mentor.jpg') }}" alt="Alexander Popov - Coding Mentor">
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="mt-16">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Our Services
                </h2>
                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Private Tutoring</h3>
                        <p class="mt-4 text-gray-500">
                            One-on-one personalized coding sessions tailored to your learning style and goals.
                        </p>
                        <div class="mt-4">
                            <span class="text-2xl font-bold text-indigo-600">$60</span>
                            <span class="text-gray-500">/hour</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900">NDIS Support</h3>
                        <p class="mt-4 text-gray-500">
                            Services can be accessed through NDIS under Core Support:<br>
                            Line item: 04_104_0125_6_1<br>
                            Description: Access Community Social and Rec Activ - Standard - Weekday Daytime
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="mt-16">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Get in Touch
                </h2>
                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Contact Details</h3>
                        <ul class="mt-4 space-y-2">
                            <li class="text-gray-500">
                                <span class="font-medium">Phone:</span> 0425 119 175
                            </li>
                            <li class="text-gray-500">
                                <span class="font-medium">Email:</span> levelupcodingsa@gmail.com
                            </li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Business Hours</h3>
                        <p class="mt-4 text-gray-500">
                            Open daily<br>
                            9:00 AM - 5:00 PM
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900">Social Media</h3>
                        <div class="mt-4 flex space-x-4">
                            <a href="https://www.facebook.com/LevelupCoding/" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="https://instagram.com/levelupcodingsa/" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                Ready to start your coding journey?
            </h2>
            <p class="mt-4 text-lg leading-6 text-indigo-200">
                Book a session today and let's unlock your programming potential together.
            </p>
            <a href="{{ route('booking') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                Book Your Session
            </a>
        </div>
    </div>
</x-app-layout>
