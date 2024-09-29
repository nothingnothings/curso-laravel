<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Display the registration page.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate the input
        $validatedAttributes = request()->validate(
                [
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                    'password_confirmation' => ['required', Password::min(5)->letters()->numbers()->max(20), 'same:password'],
                ]
                );

        // Log the user in, with one of laravel's packages:
        $isValidated = Auth::attempt($validatedAttributes);

        // If the credentials are invalid, we will throw an exception, which will be handled by laravel, automatically.
        if (!$isValidated) {
            throw ValidationException::withMessages([
                'email' => ['Sorry, the provided credentials do not match.'],
            ]);
        }

        // regenerate the session token:
        request()->session()->regenerate();

        // redirect the user to the desired page.
        return redirect('/jobs');
    }

    public function destroy()
    {
        // Log the user out, with one of laravel's packages:
        Auth::logout();

        return redirect('/');
    }
}
