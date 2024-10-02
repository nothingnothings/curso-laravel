<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); // * examine all the request data

        $userAttributes =   $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
            'password_confirmation' => 'required|min:8',

        ]);

        $employerAttributes = $request->validate([
            'employer' => 'required|string|max:255',
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        $user =  User::create($userAttributes);

        // '->store()' is a method that exists inside of 'UploadedFile' class
        $logoPath =  $request->logo->store('logos'); // * This allows us to store the file in whatever place we want (s3, storage, other services, etc). It will return us the path to the file that was stored.


        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
