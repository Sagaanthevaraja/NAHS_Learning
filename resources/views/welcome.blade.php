<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NAHS Learning') }}</title>
    <link rel="icon" href="{{ asset('favicons/favicon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="fixed left-0 right-0 top-0 z-50">
            @include('layouts.navigation')
        </div>

        <main class="pt-16">
            <section class="relative h-screen w-full bg-cover bg-center"
                style="background-image: url('{{ asset('images/background.avif') }}');">
                <div class="absolute inset-0 bg-black opacity-60"></div>
                <div class="relative z-10 flex h-full flex-col items-center justify-center text-center text-white">
                    <img src="{{ asset('images/logo.jpg') }}" alt="NAHS Learning Logo" class="mb-4 h-24 w-auto">
                    <h1 class="text-6xl font-extrabold drop-shadow-lg">
                        <span class="text-purple-500">NAHS</span> <span class="text-white opacity-80">Learning</span>
                    </h1>
                    <p class="mt-4 text-3xl font-semibold text-white drop-shadow-md">LIVE | LOVE | LEARN</p>
                    <p class="mx-auto mt-6 max-w-lg text-lg text-purple-100">Empowering students to excel in commerce
                        subjects through innovative learning experiences.</p>
                    <a href="#learn-more"
                        class="mt-8 inline-flex items-center rounded-md border border-transparent bg-purple-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-purple-700 focus:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 active:bg-purple-900">Learn
                        More</a>
                </div>
            </section>

            <section id="our-courses" class="bg-white py-16">
                <div class="container mx-auto px-4">
                    <h2 class="mb-12 text-center text-4xl font-extrabold text-gray-900">Our Courses</h2>
                    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Course Card 1 -->
                        <div
                            class="max-w-sm transform overflow-hidden rounded-lg bg-white shadow-lg transition-transform hover:scale-105">
                            <img class="h-48 w-full object-cover" src="{{ asset('images/course1.avif') }}"
                                alt="Course Image">
                            <div class="px-6 py-4">
                                <div class="mb-2 text-xl font-bold text-purple-500">Accounting
                                </div>
                                <p class="text-base text-gray-800">Grade: 10</p>
                                <p class="text-base text-gray-800">O/L Year: 2024</p>
                                <p class="text-base text-gray-800">Syllabus: Local</p>
                            </div>
                        </div>
                        <!-- Course Card 2 -->
                        <div
                            class="max-w-sm transform overflow-hidden rounded-lg bg-white shadow-lg transition-transform hover:scale-105">
                            <img class="h-48 w-full object-cover" src="{{ asset('images/course2.avif') }}"
                                alt="Course Image">
                            <div class="px-6 py-4">
                                <div class="mb-2 text-xl font-bold text-purple-500">Business
                                    Studies</div>
                                <p class="text-base text-gray-800">Grade: 11</p>
                                <p class="text-base text-gray-800">O/L Year: 2023</p>
                                <p class="text-base text-gray-800">Syllabus: Cambridge</p>
                            </div>
                        </div>
                        <!-- Course Card 3 -->
                        <div
                            class="max-w-sm transform overflow-hidden rounded-lg bg-white shadow-lg transition-transform hover:scale-105">
                            <img class="h-48 w-full object-cover" src="{{ asset('images/course3.avif') }}"
                                alt="Course Image">
                            <div class="px-6 py-4">
                                <div class="mb-2 text-xl font-bold text-purple-500">Economics</div>
                                <p class="text-base text-gray-800">Grade: 9</p>
                                <p class="text-base text-gray-800">O/L Year: 2025</p>
                                <p class="text-base text-gray-800">Syllabus: Edexcel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="testimonials" class="bg-gray-100 py-16">
                <div class="container mx-auto px-4">
                    <h2 class="mb-12 text-center text-4xl font-extrabold text-gray-900">Testimonials
                    </h2>
                    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Testimonial 1 -->
                        <div class="mx-auto max-w-sm">
                            <img class="mx-auto h-24 w-24 rounded-full" src="{{ asset('images/person1.avif') }}"
                                alt="Person Image">
                            <p class="mt-4 text-center italic text-gray-800">"NAHS Learning has
                                transformed my understanding of commerce subjects. The teachers are amazing!"</p>
                            <p class="mt-2 text-center text-gray-800">- John Doe, 2021</p>
                        </div>
                        <!-- Testimonial 2 -->
                        <div class="mx-auto max-w-sm">
                            <img class="mx-auto h-24 w-24 rounded-full" src="{{ asset('images/person2.jpg') }}"
                                alt="Person Image">
                            <p class="mt-4 text-center italic text-gray-800">"I achieved excellent
                                grades thanks to the support from NAHS Learning."</p>
                            <p class="mt-2 text-center text-gray-800">- Jane Smith, 2020</p>
                        </div>
                        <!-- Testimonial 3 -->
                        <div class="mx-auto max-w-sm">
                            <img class="mx-auto h-24 w-24 rounded-full" src="{{ asset('images/person3.jpg') }}"
                                alt="Person Image">
                            <p class="mt-4 text-center italic text-gray-800">"The learning
                                environment is superb and very supportive."</p>
                            <p class="mt-2 text-center text-gray-800">- Robert Brown, 2019</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="socials" class="bg-white py-16">
                <div class="container mx-auto px-4">
                    <h2 class="mb-12 text-center text-4xl font-extrabold text-gray-900">Follow Us</h2>
                    <div class="flex justify-center space-x-8">
                        <!-- Facebook -->
                        <a href="https://facebook.com"
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-600 text-white">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="https://instagram.com"
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-pink-500 text-white">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://whatsapp.com"
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 text-white">
                            <i class="fab fa-whatsapp text-2xl"></i>
                        </a>
                        <!-- Twitter -->
                        <a href="https://twitter.com"
                            class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-400 text-white">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-black py-4 text-center text-white">
            <div class="container mx-auto px-4">
                <div class="mb-2">
                    <a href="#" class="text-gray-400 hover:text-gray-300">Privacy Policy</a>
                    <span class="mx-2">•</span>
                    <a href="#" class="text-gray-400 hover:text-gray-300">Terms and Conditions</a>
                    <span class="mx-2">•</span>
                    <a href="#" class="text-gray-400 hover:text-gray-300">Refund Policy</a>
                </div>
                <div class="text-gray-400">
                    Copyright © 2024 NAHS Learning. All Rights Reserved.
                </div>
                <div class="text-gray-400">
                    Powered by <a href="#" class="text-purple-500 hover:text-green-400">CC GROUP 8</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
