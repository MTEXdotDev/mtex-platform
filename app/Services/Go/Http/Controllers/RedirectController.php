<?php

namespace App\Services\Go\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Go\Models\Link;

class RedirectController extends Controller
{
    public function __invoke(string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        $link->increment('click_count');

        return redirect()->away($link->destination_url);
    }
}