<?php

namespace App\Http\Controllers\admin;

use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPUnit\TestFixture\Success;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\CategoryFormRequest;

class CategoryController extends Controller
{
   public function index(){
          $category = categories::all();
        return view('admin.category.index', compact ('category'));
   }



   public function create(){
        return view('admin.category.create');
   }


   public function store(CategoryFormRequest $request){
        $data = $request->validated();

        $category = new categories;
        $category->name= $data['name'];
        $category->slug= Str::slug($data['slug']);
        $category->description= $data['description'];


           if($request->hasfile('image')){
            $file = $request->file('image');
            $fileName = time(). '.' .$file->getClientOriginalExtension();
            $file->move('uploads/category', $fileName);
            $category->image=  $fileName;

        }

        $category->meta_title= $data['meta_title'];

        $category->meta_descriptin= $data['meta_descriptin'];
        $category->meta_keyword= $data['meta_keyword'];

        $category->navber_status= $request->navber_status == true ? '1' : '0';
        $category->status= $request->status == true ? '1' : '0';
        $category->created_by= Auth::user()->id;


        $category->save();
        return redirect('admin/category')->with('message','Category stored Successfully');
     }

     public function edit($category_id){
          $category = categories::find($category_id);
        return view('admin.category.edit', compact ('category'));

     }


     public function update(CategoryFormRequest $request,$category_id){


          $data = $request->validated();

          $category = categories::find($category_id);
          $category->name= $data['name'];
          $category->slug=  Str::slug($data['slug']);
          $category->description= $data['description'];


             if($request->hasfile('image')){
              $file = $request->file('image');
              $fileName = time(). '.' .$file->getClientOriginalExtension();
              $file->move('uploads/category', $fileName);
              $category->image=  $fileName;

          }

          $category->meta_title= $data['meta_title'];

          $category->meta_descriptin= $data['meta_descriptin'];
          $category->meta_keyword= $data['meta_keyword'];

          $category->navber_status= $request->navber_status == true ? '1' : '0';
          $category->status= $request->status == true ? '1' : '0';
          $category->created_by= Auth::user()->id;


          $category->update();
          return redirect('admin/category')->with('message','Category updated Successfully');
       }


       public function delete(Request $request){

          $category = categories::find($request->category_delete_id);
          if($category){
            $category->post()->delete();
               $category->delete();
               return redirect('admin/category')->with('message','Category deleted with posts Successfully');

          }
          else{
              
               return redirect('admin/category')->with('message','Category id not deleted Successfully');
          }


       }

     }


