<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Blog;

class UserController extends Controller
{
    //
    public function userView(){
        $id = auth()->user()->id;
        $blogData = Blog::all()->where('user_id', $id)->toArray();
        if(\is_null($blogData)){
            $blogData = array();
        }

        return view('/user', compact('blogData'));
    }

    public function createUserView(){
        return view('create-blog');
    }

    public function blogUserStore(Request $request){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        if($validated){
            $id = auth()->user()->id;

            if($request->file_path){
                $image = $request->file('file_path');
                $originalName = $image->getClientOriginalName();
                $name = time().'_'.$originalName;
                $image->move('images/blogImage', $name);
            }
            else{
                $name= "";
            }
            $blog = new Blog();
            $blog->user_id      = $id;
            $blog->title        = $request->title;
            $blog->description  = $request->description;
            $blog->is_active    = "1";
            $blog->start_date   = $request->start_date;
            $blog->end_date     = $request->end_date;
            $blog->file_path    = $name;
            $blog->save();
        }

        return redirect('/user');
    }

    public function editUserView($id = 0){

        $editBlog = Blog::find($id)->toArray();

        if(is_null($editBlog)){
            return redirect('/admin');
        }
        else{
            return view('edit-user-blog', compact('editBlog'));
        }

    }

    public function editUserStore(Request $request, $id = 0){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        if($validated){
            $user_id = auth()->user()->id;

            if($request->file_path){
                $image = $request->file('file_path');
                $originalName = $image->getClientOriginalName();
                $name = time().'_'.$originalName;
                $image->move('images/blogImage', $name);
            }
            else{
                $name= "";
            }
            $updateBlogData = Blog::find($id);
            $updateBlogData->user_id      = $user_id;
            $updateBlogData->title        = $request->title;
            $updateBlogData->description  = $request->description;
            $updateBlogData->is_active    = "1";
            $updateBlogData->start_date   = $request->start_date;
            $updateBlogData->end_date     = $request->end_date;
            $updateBlogData->file_path    = $name;
            $updateBlogData->save();
        }

        return redirect('/user');

    }

    public function userDelete($id){

        $deleteBlog = Blog::find($id);
        if(!empty($deleteBlog)){
            if(!empty($deleteBlog['filepath'])){
                $image = public_path('images/blogImage' . $deleteBlog['filepath']);
                unlink($image);
            }
            $deleteBlog->delete();
        }
        return redirect('/user');
    }



    public function userLogout(){
        \Auth::logout();
        return redirect('/');
    }
}
