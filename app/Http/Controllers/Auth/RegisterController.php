<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\NewUserVerifyMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param UserRegisterRequest $userRegisterRequest
     * @return \App\Models\User
     */
    protected function register(UserRegisterRequest $userRegisterRequest)
    {
        $user = User::create([
            'full_name' => $userRegisterRequest->full_name,
            'username' => $userRegisterRequest->username,
            'email' => $userRegisterRequest->email,
            'dob' => $userRegisterRequest->dob,
            'email_verified_code' => sha1(time()),
            'password' => Hash::make($userRegisterRequest->password),
        ]);

        if ($user) {
            Mail::to($user->email)->send(new NewUserVerifyMail($user));

            return redirect()
                ->route('login')
                ->with('success', 'User verification has been sent to your email address please confirm');
        }

        return redirect()->back()->with("failed", "Something Went Wrong");
    }

    public function userVerification($email_verified_code)
    {
        $user = User::where('email_verified_code',$email_verified_code)->first();

        if ($user){
            $user->update([
                'is_verified' => 1
            ]);

            return redirect()
                ->route('login')
                ->with('success', 'Congratulations!! Your account has been verified.Please login');
        }
    }
}
