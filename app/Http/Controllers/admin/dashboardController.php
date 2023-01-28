<?php

namespace App\Http\Controllers\admin;
use App\Models\post;
use App\Models\User;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
   public function index(){
    $category = categories::count();
    $posts = post::count();
    $users = User::where('role_as','0')->count();
    $admin = User::where('role_as','1')->count();
    return view('admin.dashboard',compact('category','posts','users','admin'));
   }
}
