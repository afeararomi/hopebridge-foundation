<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Our Projects Page
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

// Scholarship Pages
Route::get('/scholarship', [ScholarshipController::class, 'showApplicationForm'])->name('scholarship.apply.show');
Route::post('/scholarship/apply', [ScholarshipController::class, 'submitApplication'])->name('scholarship.apply.submit');
Route::get('/scholarship/status', [ScholarshipController::class, 'checkStatus'])->name('scholarship.status');

// Contact Us Page
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit'); // Although not detailed in frontend, good to have.

// Donate Page
Route::get('/donate', [DonateController::class, 'index'])->name('donate');

// You might also want a route for the favicon in case it's not served automatically
Route::get('/favicon.ico', function () {
    return redirect(asset('images/logo-icon.png'));
});