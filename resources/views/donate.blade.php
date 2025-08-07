<?php // resources/views/donate.blade.php ?>
@extends('layouts.app')

@section('title', 'Donate - Support HopeBridge Foundation')
@section('description', 'Your generous donation helps HopeBridge Foundation provide essential social amenities and empower youth in rural West African communities. Support our cause today!')

@section('content')
    <section class="section-padding text-center">
        <div class="container">
            <h1 class="text-hopebridge-blue mb-4">Support Our Cause</h1>
            <p class="lead mb-5">
                Every contribution, no matter how small, helps us build bridges of hope and empowerment in West Africa.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="card shadow-lg p-4 bg-white rounded">
                        <div class="card-body">
                            <h4 class="text-hopebridge-orange mb-4">How You Can Donate</h4>
                            <p class="mb-4">Thank you for considering a donation to HopeBridge Foundation. Your generosity directly funds our vital projects, from providing clean water to empowering students with scholarships.</p>

                            <div class="accordion" id="donationOptionsAccordion">
                                {{-- Option 1: Bank Transfer --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <i class="bi bi-bank me-2 text-hopebridge-blue"></i> Bank Transfer
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#donationOptionsAccordion">
                                        <div class="accordion-body text-start">
                                            <p>You can make a direct bank transfer to our official account:</p>
                                            <p><strong>Bank Name:</strong> First Bank of Nigeria Plc</p>
                                            <p><strong>Account Name:</strong> HopeBridge Foundation</p>
                                            <p><strong>Account Number:</strong> 20XXXXXXX0 (Example)</p>
                                            <p><strong>Sort Code:</strong> 011XXXXX</p>
                                            <p class="text-muted small">Please use your name as the reference for the transfer. Email us at <a href="mailto:info@hopebridgefoundation.org">info@hopebridgefoundation.org</a> with transfer details for confirmation.</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Option 2: Online Payment (Placeholder for future integration) --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="bi bi-credit-card me-2 text-hopebridge-blue"></i> Online Payment (Coming Soon)
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#donationOptionsAccordion">
                                        <div class="accordion-body text-start">
                                            <p>We are working on integrating secure online payment gateways (e.g., Paystack, Flutterwave) to make your donation process even easier. Please check back soon!</p>
                                            <p>In the meantime, kindly use the bank transfer option above.</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Option 3: Crypto Donations (Placeholder) --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="bi bi-currency-bitcoin me-2 text-hopebridge-blue"></i> Crypto Donations (Coming Soon)
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#donationOptionsAccordion">
                                        <div class="accordion-body text-start">
                                            <p>We are exploring options to accept cryptocurrency donations. Stay tuned for updates!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-5 mb-3 text-hopebridge-blue">Where Your Donation Goes</h5>
                            <p>100% of your donation goes directly towards funding our projects, including:</p>
                            <ul class="list-unstyled text-start">
                                <li><i class="bi bi-arrow-right-circle-fill text-accent-green me-2"></i> Providing clean water and sanitation facilities.</li>
                                <li><i class="bi bi-arrow-right-circle-fill text-accent-green me-2"></i> Supporting education and skills training programs for youth.</li>
                                <li><i class="bi bi-arrow-right-circle-fill text-accent-green me-2"></i> Supplying essential healthcare resources to rural clinics.</li>
                                <li><i class="bi bi-arrow-right-circle-fill text-accent-green me-2"></i> Facilitating community development initiatives.</li>
                            </ul>

                            <p class="mt-4">Thank you for being a part of the HopeBridge family!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection