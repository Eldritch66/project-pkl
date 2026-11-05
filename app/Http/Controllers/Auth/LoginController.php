<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $expected = (string) config('app.site_password');

        if (! hash_equals($expected, (string) $request->input('password'))) {
            throw ValidationException::withMessages([
                'password' => 'Password salah.',
            ]);
        }

        $request->session()->regenerate();
        $request->session()->put('gate_authenticated', true);

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('gate_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
