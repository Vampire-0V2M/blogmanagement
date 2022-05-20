<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class LoginController extends Controller
{
    //
    public function loginView(){
        return view('login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validated)
        {
            $credentials = $request->only('role','email', 'password');

            if (\Auth::attempt($credentials)) {
                if($request->role == "admin"){
                    return redirect('admin');
                }
                else if($request->role == "user"){
                    return redirect('user');
                }
            }
            else{
                return "oops Something went wrong";
                return redirect('/');
            }
        }
    }

    public function allBlogs(){

        $blogData = Blog::all()->toArray();
        if(is_null($blogData)){
            $blogData = array();
        }

        return view('all-blogs', compact('blogData'));
    }

    public function registerView(){
        return view('register');
    }

    public function registerStore(Request $request){

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'dob' => 'required|date',
            'role' => 'required',
        ]);

        if($validated){
            if($request->file_path){
                $image = $request->file('file_path');
                $originalName = $image->getClientOriginalName();
                $name = time().'_'.$originalName;
                $image->move('images/uploads', $name);
            }
            else{
                $name = "";
            }
            $user = new User();
            $user->first_name   = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->email        = $request->email;
            $user->password     = Hash::make($request->password);
            $user->dob          = $request->dob;
            $user->file_path    = $name;
            $user->role         = $request->role;
            $user->save();
        }

        return redirect('/');

    }
}
