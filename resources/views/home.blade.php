<?php // resources/views/home.blade.php ?>
@extends('layouts.app')

@section('title', 'HopeBridge Foundation - Connecting Communities, Empowering Generations')
@section('description', 'HopeBridge Foundation: To improve the quality of life in rural communities across West Africa by providing essential social amenities and empowering youths and students.')
{{-- You can add more specific keywords here if needed --}}

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-4 mb-3 animate__animated animate__fadeInDown">Connecting Communities, Empowering Generations.</h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp">
                Improving the quality of life in rural West African communities through essential social amenities and empowering youths with education, skills, and opportunities.
            </p>
            <div class="animate__animated animate__fadeInUp animate__delay-1s">
                <a href="{{ url('/projects') }}" class="btn btn-primary btn-lg me-3">Our Projects</a>
                <a href="{{ url('/donate') }}" class="btn btn-outline-light btn-lg">Donate Now</a>
            </div>
        </div>
    </section>


    {{-- Mission & Vision Section --}}
    <section class="section-padding bg-light-gray">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="text-hopebridge-blue mb-3">Our Mission</h2>
                    <p class="lead">To improve the quality of life in rural communities across West Africa by providing essential social amenities and empowering youths and students with education, skills, and opportunities for a sustainable future.</p>
                </div>
                <div class="col-md-6">
                    <h2 class="text-hopebridge-blue mb-3">Our Vision</h2>
                    <p class="lead">A West Africa where every rural community has access to basic social infrastructure and youths are empowered to drive economic and social transformation.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Values Section --}}
    <section class="section-padding">
        <div class="container text-center">
            <h2 class="text-hopebridge-blue mb-5">Our Core Values</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="core-value-item">
                        <i class="bi bi-person-fill-up"></i> {{-- Bootstrap Icon for Empowerment --}}
                        <h4>Empowerment</h4>
                        <p>We believe in equipping individuals with the skills and resources they need to thrive.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="core-value-item">
                        <i class="bi bi-recycle"></i> {{-- Bootstrap Icon for Sustainability --}}
                        <h4>Sustainability</h4>
                        <p>We prioritize long-term impact through sustainable development initiatives.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="core-value-item">
                        <i class="bi bi-people-fill"></i> {{-- Bootstrap Icon for Inclusivity --}}
                        <h4>Inclusivity</h4>
                        <p>We foster equal opportunities for all, regardless of background or circumstances.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="core-value-item">
                        <i class="bi bi-shield-check"></i> {{-- Bootstrap Icon for Integrity --}}
                        <h4>Integrity</h4>
                        <p>We uphold transparency, accountability, and ethical standards in all our activities.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="core-value-item">
                        <i class="bi bi-handshake-fill"></i> {{-- Bootstrap Icon for Collaboration --}}
                        <h4>Collaboration</h4>
                        <p>We work with local and international partners to maximize our impact.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Call to Action Section (Example) --}}
    <section class="bg-hopebridge-orange text-white text-center py-5">
        <div class="container">
            <h2>Join Us in Making a Difference</h2>
            <p class="lead mb-4">Your support can transform lives and build stronger communities.</p>
            <a href="{{ url('/donate') }}" class="btn btn-light btn-lg">Support Our Cause</a>
        </div>
    </section>
@endsection