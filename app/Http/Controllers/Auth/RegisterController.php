<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Mail;
use Session;
use App\Mail\verifyEmailToken;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
            'language' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Register Successfully! Please verify your email!');
        $user = User::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'email' => $data['email'],
            'language' => $data['language'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        
        $thisUser = User::findOrFail($user->id);
        $this->sendVerifyEmail($thisUser);

        return $user;
    }

    /**
     * Send verification email to latest created user
     */
    public function sendVerifyEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmailToken($thisUser));
    }

    public function emailSent($email, $verifyToken)
    {
        // return $verifyToken;
        $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        $role = Role::find($user->role_id);

        if ($user)
        {
            User::where(['email' => $email, 'verifyToken' => $verifyToken])->update([
                'status' => '1',
                'verifyToken' => NULL,
                'random' => $role->uniqueString
            ]);
            Session::flash('status','Verification Completed! You can now login');
            return redirect(route('login'));
        }else {
            abort(404);
        }
    }
}
