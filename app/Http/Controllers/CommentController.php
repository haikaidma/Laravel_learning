<?php

namespace App\Http\Controllers;

use App\Http\Form\AdminCustomValidator;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    
    public function store(Request $request)
    {
    	//validate
        $this->form->validate($request ,'validateComments');
        
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
   
        return back();
    }
}
