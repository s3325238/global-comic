<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Need to remove when making auth
     */
    public function showLoginForm()
    {
        return view('ui.pages.login');
    }

    /**
     * Register function
     */

    /**
     * Show view
     */
    public function showRegisterForm()
    {
        return view('ui.pages.register');
    }

    /**
     * Submit
     */
    public function register(Request $request)
    {
        $this->validation($request);
        // $request['password'] = bcrypt($request->password);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'language' => $request['language'],
            'verifyToken' => Str::random(40),
        ]);
        // User::create(
        //     $request->all(),[
        //         'verifyToken' => Str::random(40),
        //     ]
        // );

        return redirect(route('custom.login'))->with('status','Register Successfully! Please confirm your email!');
    }

    /**
     * Validation
     */
    public function validation($request)
    {
        return $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'language' => ['required'],
        ]);
    }

}
