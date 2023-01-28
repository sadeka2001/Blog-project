<?php

namespace App\Http\Controllers\admin;

use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\PostFormRequest;
use Illuminate\Support\Str;

class postController extends Controller
{
public function index(){
        $posts = post::all();
        return view('admin.post.index',compact('posts'));
}



public function create(){
        $category = categories::where('status', '0')->get();
    return view('admin.post.create', compact('category'));
}

public function store(PostFormRequest $request){
        $data = $request->validated();
        $post = new post;


        $post->category_id = $data['category_id'];
        $post->name = $data['name'];

        $post->slug =  Str::slug($data['slug']);
        $post->description = $data['description'];

        $post->yt_frame= $data['yt_frame'];
        $post->meta_title = $data['meta_title'];
        
        $post->meta_description = $data['meta_description'];

        $post->meta_keyword = $data['meta_keyword'];
        
        $post->status= $request->status == true ? '1' : '0';
        $post->created_by= Auth::user()->id;


        $post->save();
        return redirect('admin/post')->with('message','Post Added successfully');
}

public function edit($id){
 $category = categories::where('status', '0')->get();
    $posts = post::find($id);
    return view('admin.post.edit',compact('posts','category'));
}


public function update(PostFormRequest $request, $id){

        $data = $request->validated();
        $post = post::find($id);


        $post->category_id = $data['category_id'];
        $post->name = $data['name'];

        $post->slug =  Str::slug($data['slug']);
        $post->description = $data['description'];

        $post->yt_frame= $data['yt_frame'];
        $post->meta_title = $data['meta_title'];
        
        $post->meta_description = $data['meta_description'];

        $post->meta_keyword = $data['meta_keyword'];
        
        $post->status= $request->status == true ? '1' : '0';
        $post->created_by= Auth::user()->id;


        $post->update();
        return redirect('admin/post')->with('message','Post updated successfully');


}



public function delete($id){
        $post= post::find($id);
        $post->delete();
        return redirect('admin/post')->with('message','Post deleted successfully');
}

}
