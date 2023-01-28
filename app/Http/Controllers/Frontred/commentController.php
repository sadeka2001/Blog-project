<?php

namespace App\Http\Controllers\Frontred;

use App\Models\post;
use App\Models\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class commentController extends Controller
{
   public function store(Request $request){
if(Auth::check()){
            $validator = Validator::make($request->all(),
            [
'comment_body'=>'required|string'
            ]);

            if($validator->fails()){
                return redirect()->back()->with('message', 'Cannot area is mandatory');
            }

            $post = post::where('slug',$request->post_slug)->where('status','0')->first();

         if($post){
                comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body

                ]);
                return redirect()->back()->with('message', 'Commented successfully');

         }
         else{
                return redirect()->back()->with('message', 'no such post found');
         }

}
else{
    return redirect('/login')->with('message','login first to comment');
}
   }
}
