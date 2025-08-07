<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            // Primary key (UUID)
            $table->uuid('id')->primary()->default(DB::raw('gen_random_uuid()'));

            // Timestamps
            $table->timestamp('created_at')->useCurrent();
            // Note: `updated_at` is typically included with `$table->timestamps()`

            // ProcessMaker related columns
            $table->text('pm_case_uid')->nullable();
            $table->text('pm_case_number')->nullable();

            // Core application columns
            $table->text('application_id')->unique();
            $table->text('scholarship_program_id');
            $table->text('firstname');
            $table->text('middlename')->nullable();
            $table->text('lastname');
            $table->text('email')->default('');
            $table->date('dob');
            $table->text('nationality');
            $table->text('state_of_origin');
            $table->text('lga_of_origin');
            $table->text('university_name');
            $table->text('course_of_study');

            // Document URLs
            $table->text('birth_certificate_url')->nullable();
            $table->text('national_id_card_url')->nullable();
            $table->text('university_library_card_url')->nullable();

            // Status column
            $table->text('application_status')->default('Pending');
        });


        // Enable Row Level Security (RLS) and any other raw SQL here.
        // Note: For RLS, it's often best to handle this directly in Supabase.
        // However, if you want it in the migration, you can use DB::statement.
        DB::statement('ALTER TABLE public.scholarships ENABLE ROW LEVEL SECURITY;');

        // Policy 1: Allow anonymous users to INSERT new scholarship applications
        DB::statement(
            'CREATE POLICY "Allow anon insert for new applications"
            ON public.scholarships FOR INSERT
            WITH CHECK (true);'
        );

        // Policy 2: Allow authenticated and anonymous users to SELECT their own application status by application_id
        DB::statement(
            'CREATE POLICY "Allow public select of application status"
            ON public.scholarships FOR SELECT
            USING (true);'
        );
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
