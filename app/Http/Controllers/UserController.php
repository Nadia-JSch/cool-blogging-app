<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // logout 
    public function logout() {
        auth()->logout();
        // return 'You are now logged out';
        return redirect('/')->with('successMsg', 'You are now logged out');
    }

    public function showCorrectHomepage() {

        // check if user is logged in
        if (auth()->check()) {
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }
    //
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 
            'password' => $incomingFields['loginpassword']])) {

            $request->session()->regenerate();
            // redirect here with the following message
            // params are message name and message
            return redirect('/')->with('successMsg', 'You have successfully logged in.');
        } else {
            // return 'Sorry!';
            return redirect('/')->with('failureMsg', 'Invalid login');
        }
    }
    
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // hash the password
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // store the data entered in the db
        $user = User::create($incomingFields);

        // log users in before redirecting them to the home page
        auth()->login($user);

        // save the new User details in a variable $user

        // return 'Hello from register function';
        return redirect('/')->with('successMsg', 'Thanks for creating a new account!');
    }
}
