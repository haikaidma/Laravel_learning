<?php

namespace App\Http\Controllers;

use App\Http\Form\AdminCustomValidator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasscontroller extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    public function forgotpass(Request $request)
    {
        $rand_token = openssl_random_pseudo_bytes(16);
        //change binary to hexadecimal
        $token = bin2hex($rand_token);
        //token generated
        $due=Carbon::now();
        if($request->isMethod('POST'))
        {
             $email=$request->email;
             $this->form->validate($request, 'validateForgotpass');
                DB::table('forgot_users')->insert(['token_fogot'=>$token, 'email'=>$email, 'due'=> $due]);
                // $user->fill($request->all())->save();
                // dd($user);
                $details = [    
                    'title' => 'Thông báo thay đổi mật khẩu',
                    'body' => 'Click vào link để đổi mật khẩu',
                ];
                Mail::to("$email")->send(new \App\Mail\SendMail($details, $token, $email));
                return redirect('forgot-password')->with('msg', ' We have sent password reset information to your email, please check your email and follow the instructions ');
           
        }
        return view('users.forgotPassword');
    }
    
}
