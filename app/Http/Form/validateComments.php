<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateComments
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'body' => ['required','min:5'],
        ]);
       
        return $validator->validate();
    }
}