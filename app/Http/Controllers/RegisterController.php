<?php
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Http\form\AdminCustomValidator;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class RegisterController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    public function Register(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $this->form->validate($request, 'validatorForm');
            $rand_token = openssl_random_pseudo_bytes(16);
        //change binary to hexadecimal
            $token = bin2hex($rand_token);
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $user = new User();
            $user->fill($request->all())->save();
            // $userVerify = new UserVerify;
            // $userVerify->user_id = $user->id;
            // $userVerify->token = $token;
            // $userVerify->save();
            UserVerify::create([
                'user_id' => $user->id, 
                'token' => $token
              ]);
            $email=$request->email;
            $details = [
                'title' => 'Thông báo',
                'body' => 'Chúc mừng bạn đã đăng kí thành công',
            ];
        
        Mail::to("$email")->send(new \App\Mail\AlertRegister($details, $token));
            return redirect()->back()->with('msg', ' You have successfully added ');
        }   
        return view('users.register');
    }
}
