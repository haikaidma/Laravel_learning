<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateResetpass
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'passwordchange' => ['required', 'min:6'], 
            'repasswordchange'=> ['required', 'same:passwordchange']
        ]);
       
        return $validator->validate();
    }
}