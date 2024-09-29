<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd($request->all());

        return redirect()->route('home');
    }
}
