<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display home page.
     */
    public function index(): Factory|View
    {
        return view('home');
    }

    /**
     * Display about us page.
     */
    public function aboutUs(): Factory|View
    {
        return view('about-us');
    }
}
