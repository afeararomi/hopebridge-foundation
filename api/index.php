// api/index.php
<?php

// Define a constant to indicate we are running on Vercel
define('LARAVEL_START', microtime(true));
define('IS_VERCEL', true); // Custom constant for Vercel environment

// Include the Laravel bootstrap file
require __DIR__.'/../vendor/autoload.php';

// Bootstrap the Laravel application
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incoming request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Send the response
$response->send();

$kernel->terminate($request, $response);