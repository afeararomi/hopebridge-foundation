<?php // resources/views/scholarship/apply.blade.php ?>
@extends('layouts.app')

@section('title', 'Apply for Scholarship - HopeBridge Midwestern Scholars Program')
@section('description', 'Apply for the HopeBridge Midwestern Scholars Program. A yearly scholarship for Year 2 undergraduates from Edo and Delta states, Nigeria.')

@section('head_scripts')
    {{-- For date picker (flatpickr is a good lightweight option) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">
            <h1 class="text-center text-hopebridge-blue mb-4">HopeBridge Midwestern Scholars Program Application</h1>
            <p class="lead text-center mb-5">
                Please fill out the form below to apply for the scholarship. Ensure all information is accurate and required documents are uploaded.
            </p>

            <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                <div class="card-body">
                    <form id="scholarshipApplicationForm" action="{{ url('/scholarship/apply') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf {{-- Laravel CSRF token for form submission security --}}

                        <h4 class="text-hopebridge-orange mb-4">Personal Information</h4>

                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                            <div class="col-md-4">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename">
                            </div>
                            <div class="col-md-4">
                                <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="nationality" class="form-label">Nationality <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nationality" name="nationality" value="Nigerian" required readonly>
                                <div class="invalid-feedback">Please enter your nationality.</div>
                            </div>
                            <div class="col-md-4">
                                <label for="state_of_origin" class="form-label">State of Origin <span class="text-danger">*</span></label>
                                <select class="form-select" id="state_of_origin" name="state_of_origin" required>
                                    <option value="">Select State</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Delta">Delta</option>
                                </select>
                                <div class="invalid-feedback">Please select your state of origin.</div>
                            </div>
                            <div class="col-md-4">
                                <label for="lga_of_origin" class="form-label">Local Govt Area of Origin <span class="text-danger">*</span></label>
                                <select class="form-select" id="lga_of_origin" name="lga_of_origin" required disabled>
                                    <option value="">Select LGA</option>
                                </select>
                                <div class="invalid-feedback">Please select your local government area.</div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" required>
                                <div class="invalid-feedback" id="dob-feedback">Please enter a valid date of birth (must be at least 17 years old).</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="university_name" class="form-label">University Name <span class="text-danger">*</span></label>
                                <select class="form-select" id="university_name" name="university_name" required>
                                    <option value="">Select University</option>
                                    {{-- Options will be populated by JavaScript --}}
                                </select>
                                <div class="invalid-feedback">Please select your university.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="course_of_study" class="form-label">Course of Study <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="course_of_study" name="course_of_study" required>
                                <div class="invalid-feedback">Please enter your course of study.</div>
                            </div>
                        </div>

                        <h4 class="text-hopebridge-orange mb-4 mt-5">Required Documents</h4>
                        <p class="text-muted small">Accepted file types: PNG, JPG, JPEG, PDF. Max file size: 1MB per file.</p>

                        <div class="mb-4">
                            <label for="birth_certificate" class="form-label">Birth Certificate <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="birth_certificate" name="birth_certificate" accept=".png,.jpg,.jpeg,.pdf" required>
                            <div class="invalid-feedback" id="birth_certificate_feedback"></div>
                        </div>

                        <div class="mb-4">
                            <label for="national_id_card" class="form-label">National ID Card <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="national_id_card" name="national_id_card" accept=".png,.jpg,.jpeg,.pdf" required>
                            <div class="invalid-feedback" id="national_id_card_feedback"></div>
                        </div>

                        <div class="mb-4">
                            <label for="university_library_card" class="form-label">University Library Card <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="university_library_card" name="university_library_card" accept=".png,.jpg,.jpeg,.pdf" required>
                            <div class="invalid-feedback" id="university_library_card_feedback"></div>
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')
    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- Page-specific JavaScript for Scholarship Form --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Flatpickr for Date of Birth field
            flatpickr("#dob", {
                dateFormat: "Y-m-d", // YYYY-MM-DD format
                maxDate: new Date(), // Cannot select a future date
                onChange: function(selectedDates, dateStr, instance) {
                    validateDob();
                }
            });

            // --- Data for dynamic dropdowns and validation ---
            const lgaData = {
                "Edo": [
                    "Akoko-Edo", "Egor", "Esan Central", "Esan North-East", "Esan South-East",
                    "Esan West", "Etsako Central", "Etsako East", "Etsako West", "Igueben",
                    "Ikpoba-Okha", "Oredo", "Orhionmwon", "Ovia North-East", "Ovia South-West",
                    "Owan East", "Owan West", "Uhunmwonde"
                ],
                "Delta": [
                    "Aniocha North", "Aniocha South", "Bomadi", "Burutu", "Ethiope East",
                    "Ethiope West", "Ika North-East", "Ika South", "Isoko North", "Isoko South",
                    "Ndokwa East", "Ndokwa West", "Oshimili North", "Oshimili South", "Ukwuani",
                    "Ughelli North", "Ughelli South", "Udu", "Ukwuani", "Uvwie", "Patani",
                    "Warri North", "Warri South", "Okpe", "Sapele"
                ]
            };

            const universityList = [
                "Abia State University", "Abubakar Tafawa Balewa University", "Achievers University Owo",
                "Adamawa State University", "Adekunle Ajasin University", "Adeleke University",
                "Admiralty University of Nigeria", "Afe Babalola University", "African University of Science and Technology",
                "Ahmadu Bello University", "Ajayi Crowther University", "Akwa Ibom State University",
                "Al-Hikmah University", "Al-Qalam University, Katsina", "Alex Ekwueme Federal University",
                "Ambrose Alli University", "American University of Nigeria", "Anchor University, Lagos",
                "Arthur Jarvis University", "Atiba University", "Augustine University", "Babcock University",
                "Bauchi State University", "Bayero University Kano", "Baze University", "Bells University of Technology",
                "Benson Idahosa University", "Benue State University", "Bingham University", "Borno State University",
                "Bowen University", "Caleb University", "Caritas University", "Chrisland University",
                "Christopher University", "Chukwuemeka Odumegwu Ojukwu University", "Clifford University",
                "Coal City University", "Covenant University", "Crawford University", "Crescent University, Abeokuta",
                "Crown Hill University", "Delta State University Abraka", "Dominican University Ibadan"
            ];

            // --- DOM Elements ---
            const stateOfOriginSelect = document.getElementById('state_of_origin');
            const lgaOfOriginSelect = document.getElementById('lga_of_origin');
            const universityNameSelect = document.getElementById('university_name');
            const dobInput = document.getElementById('dob');
            const emailInput = document.getElementById('email');

            const birthCertificateInput = document.getElementById('birth_certificate');
            const nationalIdCardInput = document.getElementById('national_id_card');
            const universityLibraryCardInput = document.getElementById('university_library_card');

            const maxFileSize = 1.1 * 1024 * 1024; // 1.1 MB in bytes
            const allowedFileTypes = ['image/png', 'image/jpeg', 'application/pdf'];

            // --- Functions for Dynamic Dropdowns ---

            function populateLgaDropdown(selectedState) {
                lgaOfOriginSelect.innerHTML = '<option value="">Select LGA</option>'; // Clear existing options
                if (selectedState && lgaData[selectedState]) {
                    lgaData[selectedState].forEach(lga => {
                        const option = document.createElement('option');
                        option.value = lga;
                        option.textContent = lga;
                        lgaOfOriginSelect.appendChild(option);
                    });
                    lgaOfOriginSelect.disabled = false; // Enable LGA dropdown
                } else {
                    lgaOfOriginSelect.disabled = true; // Disable if no state selected or no data
                }
                // Reset validation state for LGA
                lgaOfOriginSelect.classList.remove('is-invalid');
            }

            function populateUniversityDropdown() {
                universityList.sort(); // Optional: Sort universities alphabetically
                universityList.forEach(university => {
                    const option = document.createElement('option');
                    option.value = university;
                    option.textContent = university;
                    universityNameSelect.appendChild(option);
                });
            }

            // --- Functions for Frontend Validations ---

            function validateDob() {
                const dobValue = dobInput.value;
                const feedbackElement = document.getElementById('dob-feedback');
                if (!dobValue) {
                    dobInput.classList.remove('is-valid');
                    dobInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'Please enter your date of birth.';
                    return false;
                }

                const dobDate = new Date(dobValue);
                const currentDate = new Date();
                const ageDifferenceMs = currentDate.getTime() - dobDate.getTime();
                const ageDate = new Date(ageDifferenceMs);
                const age = Math.abs(ageDate.getUTCFullYear() - 1970); // Calculate age

                if (isNaN(dobDate.getTime()) || age < 17) {
                    dobInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'You must be at least 17 years old to apply.';
                    return false;
                } else {
                    dobInput.classList.remove('is-invalid');
                    dobInput.classList.add('is-valid');
                    return true;
                }
            }

            function validateEmail() {
                const emailValue = emailInput.value.trim();
                const feedbackElement = document.getElementById('email-feedback');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple regex for email format

                if (!emailValue) {
                    emailInput.classList.remove('is-valid');
                    emailInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'Please enter your email address.';
                    return false;
                } else if (!emailRegex.test(emailValue)) {
                    emailInput.classList.remove('is-valid');
                    emailInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'Please enter a valid email format (e.g., example@domain.com).';
                    return false;
                } else {
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                    return true;
                }
            }

            function validateFile(fileInput, feedbackId) {
                const file = fileInput.files[0];
                const feedbackElement = document.getElementById(feedbackId);

                if (!file) {
                    fileInput.classList.remove('is-valid');
                    fileInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'This document is required.';
                    return false;
                }

                if (file.size > maxFileSize) {
                    fileInput.classList.add('is-invalid');
                    feedbackElement.textContent = `File size exceeds 1.1MB. Current size: ${(file.size / (1024 * 1024)).toFixed(2)} MB`;
                    return false;
                }

                if (!allowedFileTypes.includes(file.type)) {
                    fileInput.classList.add('is-invalid');
                    feedbackElement.textContent = 'Invalid file type. Only PNG, JPG, JPEG, PDF are allowed.';
                    return false;
                }

                fileInput.classList.remove('is-invalid');
                fileInput.classList.add('is-valid');
                return true;
            }

            function validateForm() {
                let isValid = true;

                // Validate all required text/select fields (Bootstrap's native validation)
                const requiredInputs = document.querySelectorAll('#scholarshipApplicationForm [required]');
                requiredInputs.forEach(input => {
                    if (input.type === 'file') {
                        // File inputs handled by specific validateFile function
                        return;
                    }
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    }
                });

                // Specific validations
                if (!validateDob()) isValid = false;
                if (!validateFile(birthCertificateInput, 'birth_certificate_feedback')) isValid = false;
                if (!validateFile(nationalIdCardInput, 'national_id_card_feedback')) isValid = false;
                if (!validateFile(universityLibraryCardInput, 'university_library_card_feedback')) isValid = false;

                return isValid;
            }

            // --- Event Listeners ---

            stateOfOriginSelect.addEventListener('change', function() {
                populateLgaDropdown(this.value);
            });

            birthCertificateInput.addEventListener('change', function() {
                validateFile(this, 'birth_certificate_feedback');
            });

            nationalIdCardInput.addEventListener('change', function() {
                validateFile(this, 'national_id_card_feedback');
            });

            universityLibraryCardInput.addEventListener('change', function() {
                validateFile(this, 'university_library_card_feedback');
            });

            dobInput.addEventListener('change', validateDob); // Flatpickr's onChange also calls this

            document.getElementById('scholarshipApplicationForm').addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                    event.stopPropagation();
                    // Scroll to the first invalid element for better UX
                    const firstInvalid = document.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
                this.classList.add('was-validated'); // Add Bootstrap's validated class for visual feedback
            });


            // --- Initial Load Operations ---
            populateUniversityDropdown(); // Populate universities when page loads
            // Initially disable LGA dropdown until a state is selected
            lgaOfOriginSelect.disabled = true;
        });
    </script>
@endsection