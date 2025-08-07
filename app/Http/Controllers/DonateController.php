<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Display the donation page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('donate');
    }
}