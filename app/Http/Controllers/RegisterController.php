<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        // return request()->all();
        // var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255'
        ]);

        // dd('succes broo');

        // $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);

        // User::create([
        //     'name' => $attributes['name'],
        //     'password' => bcrypt($attributes['passwored'])
        // ]);

        return redirect('/');
    }
}