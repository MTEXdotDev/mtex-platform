<?php

namespace App\Services\Go\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BaseController extends Controller
{
    /**
     * The main entry point. 
     * If logged in, might redirect to dashboard, otherwise shows the creator.
     */
    public function home(): View
    {
        return view('go.home');
    }

    /**
     * The marketing/landing page.
     */
    public function lander(): View
    {
        return view('go.lander');
    }

    /**
     * The user dashboard for managing links.
     */
    public function dashboard(): View
    {
        // specific logic to fetch links would go here
        // $links = auth()->user()->links()->paginate(10);
        
        return view('go.dashboard');
    }
}