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
│   └── Providers/
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
│   │   └── xxxx_xx_xx_xxxxxx_create_scholarships_table.php
│   │   └── ... (other Laravel default migration files)
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
│   └── index.php
│   └── favicon.ico
│   └── robots.txt                # For SEO
├── resources/
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
├── routes/
│   ├── api.php
│   ├── auth.php
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
├── artisan
├── composer.json       # Project dependencies (including quix-labs/laravel-supabase-flysystem)
├── composer.lock
├── package.json
├── phpunit.xml
├── LICENSE             # Project LICENSE file
├── README.md           # Project README file
└── vite.config.js (or webpack.mix.js if using Laravel Mix)
└── vercel.json           # Vercel configuration file

```


## How to Get Started

This section provides a step-by-step of how to deploy, set up, and run this Laravel-powered HopeBridge Foundation website project on your local machine. Ensure your machine satifies the following **software prerequisites**:

### Software Prerequisites:
1.  **Git**: 
    You can download from https://git-scm.com/download/win
2.  **PHP** at least version `8.2.29`
    You can download “PHP for Windows” from https://windows.php.net/download 
3.  **Composer** at least version `2.8.2`
    Composer is the dependency manager for PHP; it is required to download Laravel packages; install from https://getcomposer.org/download/ 
4.  **Node.js and npm**: at least version `22.18.0` for Node, and version `10.9.3` for NPM
    Node.js is required to handle frontend assets with Vite. The installer bundles npm (Node Package Manager). Download it from nodejs.org 

    **NOTE**: If you upgrade your PHP versoin, then you must reinstall Composer globally on your machine to update it to match the new version of PHP on your machine.

    To check the versions installed on your machine, run the following commands on your Bash or Command Prompt terminasl; ensure the latter is opened in Administrator mode.

    ```
    git --version
    php --version
    composer --version
    node --version
    npm --version

    ```


### Clone the Repository from GitHub:
1.  Open your terminal on your Windows machine (Git Bash, PowerShell, or VS Code's integrated terminal).

2.  Navigate to the directory where you want to store the project. For example: 

    ```
    cd C:\Users\YourUser\Documents\Projects
    ```

3.  Clone the repository using the git clone command and the repository's URL:

    ```
    git clone https://github.com/afeararomi/hopebridge-foundation.git
    ```

4.  Next, navigate into the new project directory:

    ```
    cd hopebridge-foundation
    ```


### Setup Database on your Supabase Account:
You need a new Supabase project to serve as the local development database.
1.  Go to your Supabase dashboard and create a new project.
2.  Name the project e.g. `hopebridge-ngo`
3.  Save the database password you create for this new project.  This password will replace the `[YOUR_PASSWORD]` placeholder in the `DB_URL` string in your **.env** file.
4.  Once the project is created, use the vertical menu bar on the left of your screen to navigate to the **Storage** page.
5.  Create a new bucket named **scholarship-documents**. Note this should be a **private** bucket.
6.  You will need to define policies on Supabase for the new storage bucket. So use the vertical menu bar on the left of your screen to navigate to the **SQL Editor** page. Create a new snippet, paste and run the queries below.

    ```
    -- Policies for 'scholarship-documents' bucket
    -- Policy 1: Allow anonymous users to UPLOAD files to specific paths (e.g., 'applications/').
    CREATE POLICY "Allow anon upload to scholarship documents"
    ON storage.objects FOR INSERT
    WITH CHECK (bucket_id = 'scholarship-documents' AND lower(path_tokens[1]) = 'applications');

    -- Policy 2: Allow service_role to SELECT files
    CREATE POLICY "Allow service_role to read scholarship documents"
    ON storage.objects FOR SELECT
    USING (bucket_id = 'scholarship-documents' AND auth.role() = 'service_role');

    -- Policy 3: Allow service_role to DELETE files
    CREATE POLICY "Allow service_role to delete scholarship documents"
    ON storage.objects FOR DELETE
    USING (bucket_id = 'scholarship-documents' AND auth.role() = 'service_role');

    ```

7.  Use the vertical menu bar on the left of your screen to navigate to the **Project Settings** page. On the Settings menu pane on the left, click on **General**. From the **General Settings** section, copy and keep the **Project ID** string; this will replace the **`[YOUR_PROJECT_ID]`** placeholder in the `DB_URL` string in your **.env** file.
8.  Still on the **Project Settings** page, on the Settings menu pane on the left, click on **API Keys**. Under the **Legacy API Keys** tab, do the following:
    *   Copy and save the **anon or public key** string; this will replace the **`[YOUR_SUPABASE_ANON_PUBLIC_KEY]`** placeholder in the `SUPABASE_KEY` string in your **.env** file.
    *   Copy and save the **secret_role key** string; this will replace the **`[YOUR_SUPABASE_SERVICE_ROLE_KEY]`** placeholder in both the `SUPABASE_SERVICE_KEY` AND `SUPABASE_STORAGE_KEY` strings in your **.env** file.
9.  Click on the **Connect** button at the top bar of your Supabase window to open the **Connect to your Project** modal. Ensure the active tab is *Connection String*. Scroll down to the *Session pooler* section, then copy and save the **AWS server address** string, e.g., `aws-0-eu-west-3`; this will replace the **`[AWS_SERVER_ADDRESS]`**  placeholder in the `DB_URL` string in your **.env** file. Close the modal.
10. At this point, you should have values for the following placeholder strings:
    *   YOUR_PROJECT_ID
    *   AWS_SERVER_ADDRESS
    *   YOUR_SUPABASE_ANON_PUBLIC_KEY
    *   YOUR_SUPABASE_SERVICE_ROLE_KEY


### Configure the Local Environment:
1.  **Copy the Environment File:** In your terminal, run the following command to create your local .env file from the example:

    ```
    copy .env.example .env
    ```

2.  Open the **.env** file in your code editor.

3.  **Update Database and Supabase variables:** Replace the placeholder values with the credentials from your new Supabase project.

    ```
    DB_CONNECTION=pgsql
    DB_URL="postgresql://postgres.[YOUR_PROJECT_ID]:[YOUR_PASSWORD]@[AWS_SERVER_ADDRESS].pooler.supabase.com:5432/postgres"

    SUPABASE_URL="https://YOUR_PROJECT_ID.supabase.co"
    SUPABASE_KEY="YOUR_SUPABASE_ANON_PUBLIC_KEY"
    SUPABASE_SERVICE_KEY="YOUR_SUPABASE_SERVICE_ROLE_KEY"
    SUPABASE_STORAGE_BUCKET="scholarship-documents"
    SUPABASE_STORAGE_KEY="YOUR_SUPABASE_SERVICE_ROLE_KEY"
    SUPABASE_STORAGE_ENDPOINT="https://YOUR_PROJECT_ID.supabase.co"
    SUPABASE_STORAGE_PUBLIC=false
    ```

4.  **Update Mail variables:** Replace the placeholder values with the credentials from your MailGun account.

    ```
    MAIL_MAILER=smtp
    MAIL_HOST="smtp.mailgun.org"
    MAIL_PORT=587
    MAIL_USERNAME="YOUR_MAILGUN_SMTP_USER"
    MAIL_PASSWORD="YOUR_MAILGUN_SMTP_PASSWORD"
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="no-reply@hopebridgefoundation.org"
    ```


### Install Dependecies
1.  **Install PHP Dependencies:** Use Composer to install all the backend packages listed in **`composer.json`** via your terminal (preferably bash). If you have the minimum acceptable versions of PHP and Composer on your machine, you shouldn't run into any errors.

    ```
    composer install
    ```

2.  **Install Node.js Dependencies:** Use npm to install all the frontend packages listed in **`package.json`** via your terminal (preferably bash). If you have the minimum acceptable versions of Node and npm on your machine, you shouldn't run into any errors.

    ```
    npm install
    ```

3.  **Compile Frontend Assets:** Build the CSS and JavaScript files for your website. You may or may not need this step.

    ```
    npm run dev
    ```

4.  **Generate a New Application Key:** This is a crucial security step. In your terminal, run the command below; this will generate and set a unique `APP_KEY` for your local application.

    ```
    php artisan key:generate
    ```


### Run the Local Server and Test:
1.  **Run Database Migrations:** Run the `artisan` command on your terminal to create tables in your connected database.

    ```
    php artisan migrate
    ```

2.  **Clear Cache and Config:** Run these artisan commands to clear cache and config.

    ```
    php artisan cache:clear
    php artisan config:clear
    ```

3.  **Confirm Database Tables Exist:** Check your database on Supabase to see if these tables exist: `cache`, `cache_locks`, `failed_jobs`, `job_batches`, `jobs`, `migrations`, `password_reset_tokens`, `personal_access_tokens`, `scholarships`, `sessions`, and `users`. If the **scholarships** table is absent, run this query to create it along with the necessary policies for access control, using the Supabase SQL Editor. 

    ```
    CREATE TABLE public.scholarships (
        id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
        created_at timestamp with time zone DEFAULT now(),
        pm_case_uid text NULL, -- To be gotten from ProcessMaker
        pm_case_number text NULL, -- To be gotten from ProcessMaker
        application_id text UNIQUE NOT NULL, -- Ensure application_id is unique
        scholarship_program_id text NOT NULL, -- To differentiate scholarship programs
        firstname text NOT NULL,
        middlename text,
        lastname text NOT NULL,
        email text DEFAULT '' NOT NULL,
        dob date NOT NULL,
        nationality text NOT NULL,
        state_of_origin text NOT NULL,
        lga_of_origin text NOT NULL,
        university_name text NOT NULL,
        course_of_study text NOT NULL,
        birth_certificate_url text,
        national_id_card_url text,
        university_library_card_url text,
        application_status text DEFAULT 'Pending' NOT NULL
    );

    -- Enable Row Level Security on the scholarships table
    ALTER TABLE public.scholarships ENABLE ROW LEVEL SECURITY;

    -- Policy 1: Allow anonymous users to INSERT new scholarship applications
    CREATE POLICY "Allow anon insert for new applications"
    ON public.scholarships FOR INSERT
    WITH CHECK (true);

    -- Policy 2: Allow authenticated and anonymous users to SELECT their own application status by application_id
    -- Note: This assumes application_id is known. For truly public access by ID, 'true' is used.
    -- If you want this limited to *only* a specific ID, you'd add a WHERE clause here (not recommended for general status check).
    CREATE POLICY "Allow public select of application status"
    ON public.scholarships FOR SELECT
    USING (true); -- This makes all rows readable. Consider if you want more granular control, e.g., using auth.uid() if users log in.

    -- Important: Do NOT create policies for UPDATE or DELETE for 'anon' or 'authenticated' roles
    -- on this table. Updates/Deletes should be handled by your backend service role for security.

    ```

4.  **Confirm RLS on Database Tables:** Check that all database tables have RLS (Row Level Security) defined on them. If not, run this query using the Supabase SQL Editor.

    ```
    -- Enable Row Level Security on the cache table
    ALTER TABLE public.cache ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the cache_locks table
    ALTER TABLE public.cache_locks ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the failed_jobs table
    ALTER TABLE public.failed_jobs ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the job_batches table
    ALTER TABLE public.job_batches ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the jobs table
    ALTER TABLE public.jobs ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the migrations table
    ALTER TABLE public.migrations ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the password_reset_tokens table
    ALTER TABLE public.password_reset_tokens ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the personal_access_tokens table
    ALTER TABLE public.personal_access_tokens ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the sessions table
    ALTER TABLE public.sessions ENABLE ROW LEVEL SECURITY;

    -- Enable Row Level Security on the users table
    ALTER TABLE public.users ENABLE ROW LEVEL SECURITY;
    ```

5.  **Start the Laravel Development Server:** Run the `artisan` command to start the server.

    ```
    php artisan serve
    ```


6.  **Access the Website:** Open your web browser and navigate to `http://127.0.0.1:8000` (or the address provided in your terminal).

7.  **Perform Local Testing:**
    * Check all pages: Ensure the website loads correctly and looks as it should.
    * Submit a scholarship application: Fill out the form, upload the files, and submit.
    * Check your new Supabase database's **`scholarships table`** to confirm the record was inserted.
    * Check your new Supabase storage bucket i.e. **`scholarship-documents`** to confirm the files were uploaded successfully.
    * Check your local email server (e.g. MailGun) to ensure the confirmation email was sent. 


## Epilogue
We hope the deployment steps were pretty straight-forward for you. Happy Development!
