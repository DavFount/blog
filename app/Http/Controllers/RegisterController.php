<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:2', 'max:255'],
            'username' => ['required', Rule::unique('users', 'username'), 'min:3', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email'), 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created!');
    }

    public function create()
    {
        return view('register.create');
    }
}
