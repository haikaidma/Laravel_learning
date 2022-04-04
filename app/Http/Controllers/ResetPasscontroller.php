<?php
namespace App\Http\Controllers;

use App\Http\Form\AdminCustomValidator;
use App\Http\SetConst\ResetPassConst;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ResetPasscontroller extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    public function resetpass(Request $request)
    { 
        if($request->isMethod('POST'))
        {
            $this->form->validate($request,'validateResetpass');
            $email = $request->email;
            $token = $request->token;
            $date=DB::table('forgot_users')->where('token_fogot', $token)->first();
            $getDue = $date->due;
            $timeUp = Carbon::now();
            $minutes = $timeUp->diffInMinutes($getDue);
            $newPassword = $request->passwordchange;
            $hashPassword = Hash::make($newPassword);
            if( $minutes<ResetPassConst::LIMIT_TIME)
            {
                User::where('email',$email)->update(['password' => $hashPassword]);
                DB::table('forgot_users')->where('token_fogot', $token)->delete();
                return redirect('reset-password')->with('msg', ' You have successfully changed ');
            }
            else
            {
                DB::table('forgot_users')->where('token_fogot', $token)->delete();
                return redirect('forgot-password')->with('msg', 'Time to change password has expired. Please enter email to resend ');
            }
        }
        return view('users.ResetPassword');
    }
}
