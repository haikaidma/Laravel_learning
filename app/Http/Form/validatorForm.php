<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validatorForm
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','min:5','max:255'],
            'email' => ['required','email'],
            'password' => ['required','min:6'], 
            'confirm'=> ['required','same:password']
        ]);
       
        return $validator->validate();
    }
}