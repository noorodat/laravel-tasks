<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getData(Request $req)
    {
        $formType = $req->input('form_type');

        $data = [];

        if ($formType == 'signup') {
            $data['name'] = $req->input('up-uname');
            $data['email'] = $req->input('up-email');
            $data['password'] = $req->input('up-pass');
            $data['password_confirmation'] = $req->input('up-conf-pass');

            // Define custom error messages
            $messages = [
                'password.regex' => 'The password must be at least 8 characters long and contain at least one uppercase letter, one digit, and one special character (@, $, !, %, *, ?, or &).',
            ];

            // Define validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email'), // Ensure email is unique in the 'users' table
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8', // Minimum password length
                    'confirmed', // Requires a 'password_confirmation' field that matches 'password'
                    'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
                ],
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                // Redirect back to the signup-login page with errors and input data
                return Redirect::route('signup-login')->withErrors($validator)->withInput();
            }
        } else {
            $data['email'] = $req->input('email');
            $data['password'] = $req->input('password');

            // Define validation rules for login
            $rules = [
                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],
                'password' => 'required|string',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                // Redirect back to the signup-login page with errors and input data
                return Redirect::route('signup-login')->withErrors($validator)->withInput();
            }
        }

        // Return the validated data
        return $data;
    }

    public function signup(Request $req)
    {
        // Validate the user input
        $data = $this->getData($req);

        if ($data instanceof \Illuminate\Http\RedirectResponse) {
            return $data;
        }

        // Create a new user record
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']); // Hash the password

        // Save the user record to the database
        $user->save();

        // Redirect back to the signup-login page
        return Redirect::route('signup-login');
    }

    public function login(Request $req)
    {
        // Extract email and password from the request
        $email = $req->input('in-email');
        $password = $req->input('in-pass');

        // Attempt to authenticate the user manually
        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            $req->session()->put('is_logged_in', true);
            return redirect('home');
        } else {
            // Authentication failed, redirect back to the signup-login page with an error message
            return Redirect::route('signup-login')->withErrors(['login' => 'Invalid login credentials'])->withInput();
        }
    }


    public function process(Request $req)
    {
        $formType = $req->input('form_type');

        if ($formType === 'signup') {
            // Handle sign-up request
            return $this->signup($req);
        } elseif ($formType === 'login') {
            // Handle login request
            return $this->login($req);
        }
    }

    public function logout()
    {
        session(['is_logged_in' => false]);
        return redirect()->route('signup-login');
    }
}
