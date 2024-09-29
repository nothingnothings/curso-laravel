<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration page.
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // Validate the input
        $validatedAttributes = request()->validate(
                [
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    //  With the confirmed rule, we can use the same rule for the password and the password_confirmation
                    // With this chaining of the Password rule, we can add multiple rules, using a fluent interface (chaining).
                    'password_confirmation' => ['required', Password::min(5)->letters()->numbers()->max(20), 'same:password'],
                ]
                );

        // Create the user
        $user = User::create($validatedAttributes);


        // Log the user in, with one of laravel's packages:
        Auth::login($user);


        return redirect('/jobs');
    }
}
