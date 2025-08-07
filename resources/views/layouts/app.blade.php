<?php // resources/views/layouts/app.blade.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'HopeBridge Foundation')</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('description', 'HopeBridge Foundation: Connecting Communities, Empowering Generations. Providing essential social amenities for rural West African communities and empowering youth and students.')">
    <meta name="keywords" content="@yield('keywords', 'NGO, West Africa, rural development, community empowerment, youth empowerment, student scholarship, social amenities, education, Nigeria, HopeBridge Foundation')">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Social Media Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'HopeBridge Foundation')">
    <meta property="og:description" content="@yield('description', 'HopeBridge Foundation: Connecting Communities, Empowering Generations. Providing essential social amenities for rural West African communities and empowering youth and students.')">
    <meta property="og:image" content="{{ asset('images/logo-full.png') }}"> {{-- Ensure this path is correct for your full logo --}}

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}"> {{-- Path to your icon logo --}}

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- Custom HopeBridge CSS --}}
    <link rel="stylesheet" href="{{ asset('css/hopebridge.css') }}">

    @yield('head_scripts') {{-- For page-specific head scripts --}}
</head>
<body>
    {{-- Navigation Bar --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="HopeBridge Foundation Logo" height="40" class="d-inline-block align-text-top me-2">
                HopeBridge Foundation
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        {{-- Check if the current route is the 'home' route --}}
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        {{-- Check if the current route is the 'about' route --}}
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        {{-- Check if the current route is the 'projects' route --}}
                        <a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ url('/projects') }}">Our Projects</a>
                    </li>
                    <li class="nav-item">
                        {{-- Check if the current route name starts with 'scholarship' (e.g., scholarship.apply.show, scholarship.status) --}}
                        <a class="nav-link {{ request()->routeIs('scholarship.*') ? 'active' : '' }}" href="{{ url('/scholarship') }}">Scholarship</a>
                    </li>
                    <li class="nav-item">
                        {{-- Check if the current route is the 'contact.show' route --}}
                        <a class="nav-link {{ request()->routeIs('contact.show') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                    {{-- Add a donate button for calls to action --}}
                    <li class="nav-item ms-lg-3">
                        {{-- Check if the current route is the 'donate' route --}}
                        <a class="btn btn-outline-light btn-sm {{ request()->routeIs('donate') ? 'active' : '' }}" href="{{ url('/donate') }}">Donate</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content Area --}}
    <main class="py-5 mt-5"> {{-- Added padding-top to account for fixed navbar --}}
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>HopeBridge Foundation</h5>
                    <p>Connecting Communities, Empowering Generations.</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill me-2"></i>10 Nelson Mandela Way, Wuse, Abuja FCT, Nigeria.</li>
                        <li><i class="bi bi-telephone-fill me-2"></i>+2348034567890</li>
                        <li><i class="bi bi-envelope-fill me-2"></i>info@hopebridgefoundation.org</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="{{ url('/projects') }}" class="text-white text-decoration-none">Our Projects</a></li>
                        <li><a href="{{ url('/scholarship') }}" class="text-white text-decoration-none">Scholarship</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Our Mission</h5>
                    <p>To improve the quality of life in rural communities across West Africa by providing essential social amenities and empowering youths and students with education, skills, and opportunities for a sustainable future.</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} HopeBridge Foundation. All rights reserved.</p>
                {{-- Social Media Icons (placeholders) --}}
                <div class="mt-3">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-linkedin fs-4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS CDN (Bundle includes Popper.js) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigF/h/d/8oV3dYbZ3pG" crossorigin="anonymous"></script>
    {{-- Custom HopeBridge JavaScript --}}
    <script src="{{ asset('js/hopebridge.js') }}"></script>

    @yield('footer_scripts') {{-- For page-specific footer scripts --}}
</body>
</html>