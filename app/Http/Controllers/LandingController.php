<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{

    /**
     * Show the applications landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.landing');
    }
}
