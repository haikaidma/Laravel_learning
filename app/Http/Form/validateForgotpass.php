<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateForgotpass
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'email' => ['required','email','exists:users,email']
        ],
        [
            'email.exists' =>'email không tồn tại'
        ]
    );
       
        return $validator->validate();
    }
}