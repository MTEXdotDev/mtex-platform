<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Show the activity log.
     */
    public function index(Request $request): View
    {
        $activities = Activity::where(function ($query) use ($request) {
                $query->where('causer_id', $request->user()->id)
                      ->where('causer_type', get_class($request->user()));
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('subject_id', $request->user()->id)
                      ->where('subject_type', get_class($request->user()));
            })
            ->latest()
            ->paginate(15);

        return view('settings.activity', [
            'activities' => $activities
        ]);
    }
}