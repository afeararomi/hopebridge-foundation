<?php // resources/views/about.blade.php ?>
@extends('layouts.app')

@section('title', 'About Us - HopeBridge Foundation')
@section('description', 'Learn more about HopeBridge Foundation, our history, team, and commitment to rural development and youth empowerment in West Africa.')

@section('content')
    <section class="section-padding">
        <div class="container">
            <h1 class="text-center text-hopebridge-blue mb-5">About HopeBridge Foundation</h1>
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('images/about-us-hero.jpg') }}" class="img-fluid rounded shadow-sm" alt="HopeBridge Foundation team working in a community"> {{-- Placeholder image --}}
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2 class="text-hopebridge-orange mb-3">Our Story</h2>
                    <p>Founded with a deep commitment to uplift underserved communities, HopeBridge Foundation began its journey in 2018. Witnessing the glaring disparities in access to basic amenities and opportunities in rural West Africa, a group of passionate individuals came together with a singular vision: to bridge the gap between need and provision, and to empower the next generation.</p>
                    <p>Since our inception, we have tirelessly worked towards improving living standards, fostering education, and cultivating sustainable growth in areas often overlooked by mainstream development.</p>
                </div>
            </div>

            <hr class="my-5">

            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2 class="text-hopebridge-blue">Our Guiding Principles</h2>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-lightbulb-fill text-hopebridge-orange fs-2 mb-3"></i>
                            <h5 class="card-title text-hopebridge-blue">Innovation</h5>
                            <p class="card-text">We constantly seek and implement innovative solutions to complex community challenges, ensuring our impact is both effective and lasting.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-heart-fill text-hopebridge-orange fs-2 mb-3"></i>
                            <h5 class="card-title text-hopebridge-blue">Compassion</h5>
                            <p class="card-text">Every initiative we undertake is driven by a profound sense of empathy and a genuine desire to alleviate suffering and improve lives.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <i class="bi bi-graph-up-arrow text-hopebridge-orange fs-2 mb-3"></i>
                            <h5 class="card-title text-hopebridge-blue">Impact-Driven</h5>
                            <p class="card-text">Our success is measured by the tangible improvements we bring to communities and the measurable empowerment of individuals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <h2 class="text-hopebridge-blue mb-4">Our Leadership Team</h2>
                <p class="lead">Meet the dedicated individuals guiding HopeBridge Foundation's mission.</p>
                {{-- Placeholder for team members --}}
                <div class="row justify-content-center mt-4">
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset('images/team-member-ceo.jpg') }}" class="card-img-top rounded-circle p-3" alt="Team Member Name">
                            <div class="card-body">
                                <h5 class="card-title text-hopebridge-orange">Dr. Aisha Bello</h5>
                                <p class="card-text text-dark-gray">Founder & CEO</p>
                                <small class="text-muted">Passionate advocate for sustainable development.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset('images/team-member-coo.jpg') }}" class="card-img-top rounded-circle p-3" alt="Team Member Name">
                            <div class="card-body">
                                <h5 class="card-title text-hopebridge-orange">Mr. Emeka Obi</h5>
                                <p class="card-text text-dark-gray">Operations Director</p>
                                <small class="text-muted">Expert in logistics and project management.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset('images/team-member-pm.jpg') }}" class="card-img-top rounded-circle p-3" alt="Team Member Name">
                            <div class="card-body">
                                <h5 class="card-title text-hopebridge-orange">Ms. Zara Khan</h5>
                                <p class="card-text text-dark-gray">Program Coordinator</p>
                                <small class="text-muted">Leads youth empowerment initiatives.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection