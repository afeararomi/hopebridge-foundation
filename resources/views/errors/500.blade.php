<?php // resources/views/errors/500.blade.php ?>
@extends('layouts.app')

@section('title', 'Server Error - HopeBridge Foundation')
@section('description', 'An unexpected server error occurred. Please try again later or contact support.')

@section('content')
    <section class="section-padding text-center py-5">
        <div class="container">
            <h1 class="display-1 text-danger">500</h1>
            <h2 class="mb-4">Server Error</h2>
            <p class="lead mb-4">
                We're sorry, but something went wrong on our server. We are working to fix this as soon as possible.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Go to Homepage</a>
        </div>
    </section>
@endsection