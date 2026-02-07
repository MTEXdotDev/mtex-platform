<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use App\Rules\UniqueHandle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('pages.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', new UniqueHandle],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('pages.home');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pages.home');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToGithub(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleGithubCallback(): RedirectResponse
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'GitHub authentication failed.');
        }

        $user = User::where('github_id', $githubUser->getId())->first();

        if ($user) {
            $user->update([
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]);
        } else {
            $user = User::where('email', $githubUser->getEmail())->first();

            if ($user) {
                $user->update([
                    'github_id' => $githubUser->getId(),
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]);
            } else {
                $baseHandle = $githubUser->getNickname() ?? Str::slug($githubUser->getName());
                $newHandle = $baseHandle;
                $counter = 1;

                while (
                    User::where('username', $newHandle)->exists() || 
                    Organization::where('handle', $newHandle)->exists()
                ) {
                    $newHandle = $baseHandle . '-' . $counter;
                    $counter++;
                }

                $user = User::create([
                    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                    'username' => $newHandle,
                    'email' => $githubUser->getEmail(),
                    'github_id' => $githubUser->getId(),
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                    'avatar_path' => $githubUser->getAvatar(),
                    'password' => null,
                ]);
            }
        }

        Auth::login($user);

        return redirect()->route('pages.home');
    }
}