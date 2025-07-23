<?php // resources/views/projects.blade.php ?>
@extends('layouts.app')

@section('title', 'Our Projects - HopeBridge Foundation')
@section('description', 'Discover HopeBridge Foundation\'s impact: a list of completed and ongoing community projects in various states across Nigeria, focusing on social amenities and youth empowerment.')

@section('content')
    <section class="section-padding">
        <div class="container">
            <h1 class="text-center text-hopebridge-blue mb-5">Our Impactful Projects</h1>

            <p class="lead text-center mb-5">
                HopeBridge Foundation is committed to bringing sustainable change to rural communities. Here are some of our completed and ongoing projects across Nigeria, transforming lives one community at a time.
            </p>

            {{-- Project Categories/Filters (Optional, if you want to expand later) --}}
            {{--
            <div class="d-flex justify-content-center mb-4">
                <button class="btn btn-outline-hopebridge-orange mx-2 active">All Projects</button>
                <button class="btn btn-outline-hopebridge-orange mx-2">Water & Sanitation</button>
                <button class="btn btn-outline-hopebridge-orange mx-2">Education & Skills</button>
                <button class="btn btn-outline-hopebridge-orange mx-2">Healthcare</button>
            </div>
            --}}

            <div class="row g-4">
                {{-- Project 1: Borehole Water Project, Edo State --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('images/project-borehole.jpg') }}" class="card-img-top" alt="Community members around a new borehole"> {{-- Placeholder image --}}
                        <div class="card-body">
                            <h5 class="card-title text-hopebridge-blue">Community Borehole Project</h5>
                            <p class="card-text"><small class="text-muted">Etsako West, Edo State</small></p>
                            <p class="card-text">Provided a new solar-powered borehole to a community previously lacking access to clean drinking water, significantly improving public health and reducing water-borne diseases.</p>
                            <ul class="list-unstyled mb-0">
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Clean water for over 2,000 residents</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Reduced cases of typhoid and cholera</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Community management training provided</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#" class="btn btn-sm btn-hopebridge-orange">Learn More</a>
                        </div>
                    </div>
                </div>

                {{-- Project 2: Youth Digital Skills Training, Delta State --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('images/project-digital-skills.jpg') }}" class="card-img-top" alt="Youths learning digital skills on computers"> {{-- Placeholder image --}}
                        <div class="card-body">
                            <h5 class="card-title text-hopebridge-blue">Youth Digital Skills Empowerment</h5>
                            <p class="card-text"><small class="text-muted">Ughelli North, Delta State</small></p>
                            <p class="card-text">An ongoing program equipping 50+ youths with essential digital literacy, web development, and graphic design skills to enhance their employability and entrepreneurial potential.</p>
                            <ul class="list-unstyled mb-0">
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> 50+ beneficiaries trained annually</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Partnership with local tech hubs</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Career mentorship and job placement assistance</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#" class="btn btn-sm btn-hopebridge-orange">Learn More</a>
                        </div>
                    </div>
                </div>

                {{-- Project 3: School Renovation & Supplies, Edo State --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('images/project-school.jpg') }}" class="card-img-top" alt="Renovated school building with happy children"> {{-- Placeholder image --}}
                        <div class="card-body">
                            <h5 class="card-title text-hopebridge-blue">Rural School Infrastructure Upgrade</h5>
                            <p class="card-text"><small class="text-muted">Esan West, Edo State</small></p>
                            <p class="card-text">Renovated a dilapidated primary school block, provided new desks, chairs, and textbooks, creating a conducive learning environment for hundreds of students.</p>
                            <ul class="list-unstyled mb-0">
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> 3 classroom blocks fully renovated</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Donation of 500+ textbooks and learning materials</li>
                                <li><i class="bi bi-check-circle-fill text-accent-green me-2"></i> Improved student attendance and performance</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#" class="btn btn-sm btn-hopebridge-orange">Learn More</a>
                        </div>
                    </div>
                </div>

                {{-- Add more projects as needed --}}
                <div class="col-12 text-center mt-5">
                    <p class="lead">Interested in supporting our projects or learning more? <a href="{{ url('/contact') }}" class="text-hopebridge-orange text-decoration-none">Contact Us</a>.</p>
                </div>
            </div>
        </div>
    </section>
@endsection