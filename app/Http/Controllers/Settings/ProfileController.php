<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Rules\UniqueHandle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('settings.profile', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', new UniqueHandle, 'unique:users,username,'.$user->id],
            'timezone' => ['required', 'string', 'max:255'],
            // 'avatar'
        ]);

        $user->update($validated);

        return back()->with('status', 'Profile information updated.');
    }
}