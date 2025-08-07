<?php // resources/views/contact.blade.php ?>
@extends('layouts.app')

@section('title', 'Contact Us - HopeBridge Foundation')
@section('description', 'Get in touch with HopeBridge Foundation for inquiries, partnerships, or support. Find our address, phone number, and email.')

@section('content')
    <section class="section-padding">
        <div class="container">
            <h1 class="text-center text-hopebridge-blue mb-4">Get in Touch With Us</h1>
            <p class="lead text-center mb-5">
                We'd love to hear from you! Whether you have a question, want to partner, or offer support, our team is ready to assist.
            </p>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 bg-white rounded h-100">
                        <div class="card-body">
                            <h4 class="text-hopebridge-orange mb-4">Send Us a Message</h4>
                            <form action="{{ url('/contact') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="contact_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                                    <div class="invalid-feedback">Please enter your name.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Your Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact_subject" name="contact_subject" required>
                                    <div class="invalid-feedback">Please enter a subject.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="contact_message" name="contact_message" rows="5" required></textarea>
                                    <div class="invalid-feedback">Please enter your message.</div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 bg-white rounded h-100">
                        <div class="card-body">
                            <h4 class="text-hopebridge-orange mb-4">Our Contact Details</h4>
                            <ul class="list-unstyled contact-details-list">
                                <li class="mb-3">
                                    <i class="bi bi-geo-alt-fill text-hopebridge-blue fs-4 me-3 align-middle"></i>
                                    <address class="d-inline-block mb-0">
                                        <strong>Office Address:</strong><br>
                                        10 Nelson Mandela Way, Wuse,<br>
                                        Abuja FCT, Nigeria.
                                    </address>
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-telephone-fill text-hopebridge-blue fs-4 me-3 align-middle"></i>
                                    <strong>Phone:</strong><br>
                                    +2348034567890
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-envelope-fill text-hopebridge-blue fs-4 me-3 align-middle"></i>
                                    <strong>Email:</strong><br>
                                    info@hopebridgefoundation.org
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-clock-fill text-hopebridge-blue fs-4 me-3 align-middle"></i>
                                    <strong>Business Hours:</strong><br>
                                    Monday - Friday: 9:00 AM - 5:00 PM (WAT)
                                </li>
                            </ul>

                            <h4 class="text-hopebridge-orange mb-3 mt-5">Find Us on the Map</h4>
                            {{-- Google Maps Embed Placeholder --}}
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.545740032915!2d7.478917875024449!3d9.062837990977251!2m3!1f0!2f0!3f0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e75525048d217%3A0x6a19f2c1f1f7e0d3!2sNelson%20Mandela%20Way%2C%20Wuse%2C%20Abuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1701024000000!5m2!1sen!2sng" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')
    <script>
        // Basic client-side validation for the contact form
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            const form = event.target;
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    </script>
    <style>
        /* Custom styling for map responsiveness */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            position: relative;
            height: 0;
        }
        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
            border-radius: 8px; /* Match card styling */
        }

        .contact-details-list li i {
            width: 30px; /* Ensure icon alignment */
            text-align: center;
        }
    </style>
@endsection