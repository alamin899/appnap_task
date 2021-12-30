<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */


    public function showResetForm($token)
    {
        $resetPasswordData = $this->getPasswordReset(null, $token);

        if ($resetPasswordData) {
            return view('auth.passwords.reset')
                ->with(['token' => $resetPasswordData->token]);
        }

        return redirect()->route('password.request')->with('failed', 'Token does not matched');
    }


    public function reset(Request $request)
    {
        $this->resetValidation($request);

        $resetPasswordData = $this->getPasswordReset($request->username, $request->token);

        if ($resetPasswordData) {
            $user = User::where('username', $request->username)->first();

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Congratulations !! Password Reset Success');
        }

        return redirect()->route('password.request')->with('failed', 'Token Or Username Does Not Matched');

    }


    private function resetValidation(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }


    private function getPasswordReset($username = null, $token = null)
    {
        return DB::table('password_resets')
            ->when(!empty($username), function ($passwordResets) use ($username) {
                $passwordResets->where('username', $username);
            })
            ->when(!empty($token), function ($passwordResets) use ($token) {
                $passwordResets->where('token', $token);
            })
            ->first();
    }
}
