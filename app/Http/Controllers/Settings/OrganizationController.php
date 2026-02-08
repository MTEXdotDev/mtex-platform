<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    /**
     * List the user's organizations.
     */
    public function index(Request $request): View
    {
        return view('settings.organizations', [
            'organizations' => $request->user()->organizations,
        ]);
    }

    /**
     * Leave an organization.
     */
    public function leave(Request $request, Organization $organization)
    {
        if (!$request->user()->organizations->contains($organization)) {
            abort(403);
        }

        $request->user()->organizations()->detach($organization);

        return back()->with('status', "You have left {$organization->name}.");
    }
}