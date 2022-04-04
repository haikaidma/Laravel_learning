<?php

namespace App\Http\Controllers;
use App\Http\form\AdminCustomValidator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
    public function list()
    {
        $user = User::all();
        return View('users.show')->with(compact(['user']));
    }
    public function getDelete($id)
    {
        $user=User::find($id)->delete();
        return redirect()->back()->with('msg',' You have successfully deleted ');
    }
   public function getUpdate(Request $request , $id)
   {
    $user = User::find($id);
    if ($request->isMethod('POST'))
    {
        $this->form->validate($request,'updateUserForm');
        $user->fill($request->all())->save();
        return redirect('list-user')->with('msg', 'You have successfully updated ');
    }
        return view('users.update')->with(compact(['user']));
   }
}
