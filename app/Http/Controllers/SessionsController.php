<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        //attemp to authenticate and log in the user
        //based on the provided credetntials
        if(auth()->attempt($attributes)){
            //session fixation
            session()->regenerate();

            //redirect with success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        //auth failed.
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }


}
