<?php

namespace App\Http\Controllers;

use App\Http\Form\AdminCustomValidator;
use App\Models\Formmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{

    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    public function Login(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $this->form->validate($request,'validateFormLogin');
            $email = $request->email;
            $password = $request->password;
            // $remember=$request->has('remember')?true:false;
            $remember=$request->remember;
            if(Auth()->attempt(['email'=>$email,'password'=>$password],$remember))
            {
                $user = auth()->user();
                // dd($user);
                return redirect()->route('post.index');
            } else
            {
                return redirect()->back()->withErrors('email or password wrong');
            }
        }

        return View('users.login');
    }
   public function logout()
   {
    Auth::logout();
    return view('users.login');
   } 
}