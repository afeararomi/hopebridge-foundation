<?php // resources/views/errors/404.blade.php ?>
@extends('layouts.app')

@section('title', 'Page Not Found - HopeBridge Foundation')
@section('description', 'The page you are looking for could not be found. Please check the URL or return to the homepage.')

@section('content')
    <section class="section-padding text-center py-5">
        <div class="container">
            <h1 class="display-1 text-hopebridge-blue">404</h1>
            <h2 class="mb-4">Page Not Found</h2>
            <p class="lead mb-4">
                Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Go to Homepage</a>
        </div>
    </section>
@endsection