<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateFormLogin
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => ['required','min:6'], 
        ]);
       
        return $validator->validate();
    }
}