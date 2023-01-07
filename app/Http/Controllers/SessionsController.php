<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', ' You have been logged out.');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'], // , Rule::exists('users', 'email')
            'password' => ['required']
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        return redirect('/')->with('You have been logged in.');
    }
}
