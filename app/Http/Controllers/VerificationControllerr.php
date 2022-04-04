<?php

namespace App\Http\Controllers;

use App\Http\SetConst\ResetPassConst;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerificationControllerr extends Controller
{
    use VerifiesEmails, RedirectsUsers;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        if(Auth::check())
        {
            return view('users.listuser');
        }
        return redirect("loginuser")->withSuccess('Opps! You do not have access');
    }
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser))
        {
            $timeNow = Carbon::now();
            $timeData=$verifyUser->created_at;
            $timeLimit=$timeNow->diffInMinutes($timeData);
            $id=$verifyUser->user_id;
                $user = $verifyUser->user;
                if(!$user->email_verified_at)
                {
                    if($timeLimit<ResetPassConst::LIMIT_TIME_CONST)
                    {
                    $verifyUser->user->email_verified_at = Carbon::now();
                    $verifyUser->user->save();
                    $verifyUser->delete();
                    $message = "Your e-mail is verified. You can now login.";
                    }
                    else
                    {
                        User::where('id', $id)->delete();
                        // DB::table('users_verify')->where('user_id', $id)->delete();
                        return  redirect('register-user')->with('msg', 'Authentication expired please re-register');
                    }
                } else {
                    $message = "Your e-mail is already verified. You can now login.";
                }
        }
  
      return redirect()->route('login.user')->with('message', $message);
    }
}
