<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        // User ko authenticate karo
        $request->authenticate();

        // Session ko regenerate karo
        $request->session()->regenerate();

        // Admin check karo
       if (Auth::user()->is_admin == 1) {
            return redirect()->route('dashboard');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Only admins can access this area.');
        }
        return redirect()->route('login')->with('error', 'Only admins can access this area.');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/login');
    }
}
