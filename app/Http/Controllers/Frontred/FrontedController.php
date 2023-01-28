<?php

namespace App\Http\Controllers\Frontred;
use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontedController extends Controller
{
  public function index(){
        $all_categories = categories::where('status', '0')->get();
        $latest_posts = post::where('status', '0')->orderBy('created_at','DESC')->get()->take(10);
        return view('fronted.index',compact('all_categories','latest_posts'));
  }


  public function viewPostCategory(string $category_slug)
  {

    $category=categories::where('slug',$category_slug)->where('status','0')->first();
            if($category){

            $post = post::where('category_id', $category->id)->where('status','0')->paginate(5);

            return view('fronted.post.index',compact ('post','category'));

    }
    else{
            return redirect('/');
    }

}
    public function viewPost(string $category_slug , string $post_slug)
    {


        $category=categories::where('slug', $category_slug)->where('status','0')->first();
        if($category){

        $post = post::where('category_id', $category->id)->where('slug',$post_slug)->where('status','0')->first();
        $latest_posts = post::where('category_id', $category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(10);


        return view('fronted.post.view', compact ('post','latest_posts'));

}
else{
        return redirect('/');
}

    }



}
