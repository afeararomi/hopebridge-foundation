# HopeBridge Foundation Website

## Project Overview

Welcome to the HopeBridge Foundation website repository! This project aims to create a modern, responsive, and operational web platform for the HopeBridge Foundation, an NGO dedicated to providing essential social amenities for rural communities and empowering youths and students in West Africa, particularly in Nigeria.

This repository contains the codebase for the official HopeBridge Foundation website, including core information, community projects showcase, and a dedicated scholarship application portal for the "HopeBridge Midwestern Scholars Program."

## Brand Elements

The HopeBridge Foundation brand identity is built around a blend of stability, hope, and community.

**Primary Colors:**
* **HopeBridge Blue:** `#002244` (Dark, representing trust, stability, and professionalism)
* **HopeBridge Orange:** `#F46A1F` (Vibrant, representing hope, energy, and community)

**Secondary Colors:**
* **Light Grey:** `#F8F9FA` (For backgrounds, softer elements)
* **Dark Grey:** `#343A40` (For text, strong contrasts)
* **Accent Green:** `#28A745` (For success indicators, calls to action)

**Logo Concept:**
The logo combines a stylized bridge icon with a subtle hand reaching upwards, symbolizing "Connecting Communities" and "Empowering Generations." It primarily utilizes HopeBridge Blue and Orange.

**Logo Files:**
* `logo.svg`: Scalable Vector Graphics for crisp display at any size.
* `logo-icon.png`: Favicon and smaller icon usage.
* `logo-full.png`: Full logo with text for general use.

These logo files are located in `public/assets/img/`.

## Folder and File Structure

The project follows a clean and organized folder structure, separating public-facing files from sensitive server-side logic and configuration.
```
hopebridge-foundation/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AboutController.php
│   │   │   ├── ContactController.php
│   │   │   ├── DonateController.php
│   │   │   ├── HomeController.php
│   │   │   ├── ProjectController.php
│   │   │   └── ScholarshipController.php
│   │   └── Middleware/
│   │       └── ... (Laravel default middleware)
│   ├── Mail/
│   │   ├── ContactFormMail.php
│   │   └── ScholarshipApplicationConfirmation.php
│   └── Models/
│       └── Scholarship.php
├── bootstrap/
│   └── ... (Laravel default files)
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── filesystems.php   # <-- This file will have the Supabase disk configuration
│   ├── logging.php      # <-- This file configures daily logs
│   └── ... (other Laravel config files)
├── database/
│   ├── migrations/
│   │   └── 2025_xx_xx_xxxxxx_create_scholarships_table.php  # (if a migration is created)
│   └── ... (Laravel default files)
├── public/
│   ├── css/
│   │   └── hopebridge.css
│   ├── images/
│   │   ├── about-us-hero.jpg      # Sample image
│   │   ├── hero-bg.jpg            # Sample image (if used for hero section)
│   │   ├── logo.svg
│   │   ├── logo-full.png
│   │   ├── logo-icon.png
│   │   ├── project-borehole.jpg   # Sample image
│   │   ├── project-digital-skills.jpg # Sample image
│   │   ├── project-school.jpg     # Sample image
│   │   └── team-member-placeholder.jpg # Sample image
│   ├── js/
│   │   └── hopebridge.js
│   └── robots.txt                # For SEO
├── resources/
│   ├── css/
│   │   └── app.css (Laravel default, used if compiling with Vite/Mix)
│   ├── js/
│   │   └── app.js (Laravel default, used if compiling with Vite/Mix)
│   ├── sass/ (if using Sass for custom CSS)
│   │   └── app.scss
│   ├── views/
│   │   ├── emails/
│   │   │   ├── contact.blade.php
│   │   │   └── scholarship_confirmation.blade.php
│   │   ├── errors/
│   │   │   ├── 404.blade.php
│   │   │   └── 500.blade.php
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── scholarship/
│   │   │   ├── apply.blade.php
│   │   │   └── status.blade.php
│   │   ├── about.blade.php
│   │   ├── contact.blade.php
│   │   ├── donate.blade.php
│   │   ├── home.blade.php
│   │   └── projects.blade.php
│   └── views/
│       └── welcome.blade.php (Laravel default, can be removed)
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php                  # <-- All your web routes defined here
├── storage/
│   ├── app/
│   │   └── public/
│   │       └── scholarship_documents/ # For temporary local file storage before Supabase integration is fully live
│   ├── framework/
│   └── logs/
│       └── laravel-YYYY-MM-DD.log # Daily log files will appear here
├── tests/
│   └── ... (Laravel default files)
└── vendor/             # (Optional) Composer dependencies (if any PHP libraries are added in the future)
├── .env                # Environment variables for Supabase, Mail, etc. (NOT committed to Git)
├── .env.example        # Example .env file (committed to Git)
├── .gitattributes
├── .gitignore          # Ensures .env and vendor/ are ignored by Git
├── composer.json       # Project dependencies (including quix-labs/laravel-supabase-flysystem)
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md           # Project README file
├── LICENSE             # Project LICENSE file
├── server.php
└── vite.config.js (or webpack.mix.js if using Laravel Mix)
└── vercel.json           # Vercel configuration file
```


## How to Get Started

This section provides a high-level overview of setting up and running the HopeBridge Foundation website.

1.  **Clone the Repository:**
    Get a copy of the project code from GitHub.
2.  **Environment Configuration:**
    Set up your `.env` file with necessary database credentials (Supabase), email settings, and application constants. Remember to encrypt sensitive passwords and manage the encryption key securely.
3.  **Database Setup (Supabase):**
    Create your database and tables in Supabase as per the schema (e.g., `scholarships`). Configure Supabase Storage for document uploads.
4.  **Install Dependencies (if any):**
    While this project avoids frameworks, if external PHP libraries (like PHPMailer for robust email sending) are later introduced, Composer might be required.
5.  **Deployment (Vercel):**
    Deploy the application to Vercel, ensuring correct `vercel.json` configuration for PHP runtime and environment variables.

For detailed instructions on setup, development, and deployment, please refer to the comprehensive documentation provided by the development team.