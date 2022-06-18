<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register Form
    public function create(): Factory|View|Application
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => 'required|confirmed',
        ]);

        // Hash password

        $formFields['password'] = bcrypt($formFields['password']);



        $user = User::create($formFields);

        auth()->login($user);
        return redirect('/')->with('message','user create and login');
    }

    // Logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('message',"You are logged out");
    }

    // Show Login Form
    public function login(): Factory|View|Application
    {
        return view('users.login');
    }

    // Login user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if (auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect("/")->with('message','You are logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credential'])->onlyInput('email');
    }

}
