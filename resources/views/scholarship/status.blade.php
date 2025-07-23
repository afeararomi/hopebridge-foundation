<?php // resources/views/scholarship/status.blade.php ?>
@extends('layouts.app')

@section('title', 'Check Scholarship Status - HopeBridge Foundation')
@section('description', 'Check the status of your HopeBridge Midwestern Scholars Program application by entering your Application ID.')

@section('content')
    <section class="section-padding">
        <div class="container">
            <h1 class="text-center text-hopebridge-blue mb-4">Check Application Status</h1>
            <p class="lead text-center mb-5">
                Enter your unique Application ID below to get the current status of your scholarship application.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6">
                    <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                        <div class="card-body">
                            <form id="statusCheckForm" action="{{ url('/scholarship/status') }}" method="GET">
                                {{-- Using GET as this is typically for fetching data, not creating/modifying --}}
                                <div class="mb-3">
                                    <label for="application_id" class="form-label">Application ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="application_id" name="application_id" placeholder="Enter your Application ID" required value="{{ request('application_id') }}">
                                    <div class="invalid-feedback">Please enter your application ID.</div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Check Status</button>
                                </div>
                            </form>

                            {{-- Display Status Results (Conditional Rendering) --}}
                            @if(isset($applicationStatus))
                                <div class="mt-4 p-3 border rounded {{ $applicationStatus == 'Pending' || $applicationStatus == 'Under Review' ? 'border-warning text-warning' : ($applicationStatus == 'Approved' ? 'border-success text-success' : 'border-danger text-danger') }}">
                                    <h5 class="mb-2">Application Status for ID: <span class="text-hopebridge-blue">{{ request('application_id') }}</span></h5>
                                    <p class="lead">Status: <strong>{{ $applicationStatus }}</strong></p>
                                    @if($applicationStatus == 'Pending')
                                        <p class="mb-0">Your application has been received and is awaiting initial review. Please check back later for updates.</p>
                                    @elseif($applicationStatus == 'Under Review')
                                        <p class="mb-0">Your application is currently being reviewed by our team. We will notify you of any changes.</p>
                                    @elseif($applicationStatus == 'Approved')
                                        <p class="mb-0">Congratulations! Your scholarship application has been approved. You will receive further instructions via email soon.</p>
                                    @elseif($applicationStatus == 'Rejected')
                                        <p class="mb-0">We regret to inform you that your application was not successful at this time. Due to the high volume of applications, we cannot provide individual feedback.</p>
                                    @else
                                        <p class="mb-0">No specific status message available. Please contact us if you have concerns.</p>
                                    @endif
                                </div>
                            @elseif(isset($error))
                                <div class="mt-4 alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Basic client-side validation for the application ID field
            const statusCheckForm = document.getElementById('statusCheckForm');
            statusCheckForm.addEventListener('submit', function(event) {
                const applicationIdInput = document.getElementById('application_id');
                if (!applicationIdInput.value.trim()) {
                    event.preventDefault(); // Prevent form submission
                    applicationIdInput.classList.add('is-invalid');
                } else {
                    applicationIdInput.classList.remove('is-invalid');
                }
            });
        });
    </script>
@endsection