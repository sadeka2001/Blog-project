<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }



    public function edit($id=null){
        $user = User::find($id);
        return view('admin.user.edit' , compact('user'));
    }

    public function update(Request $request, $id){
      
        $user = User::find($id);


            if($user){
            $user->role_as = $request->role_as;
            $user->update();

         return redirect('admin/users')->with('message', 'user updated successfully');

        }
       
            return redirect('admin/users')->with('message', 'Not updated successfully');
        }
        
   
    }


