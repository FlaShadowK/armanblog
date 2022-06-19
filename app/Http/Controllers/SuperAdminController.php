<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    //
    public function index(){

        return view('super.admin-index');
    }

    public function posts(){

        $posts = Post::all();

        return view('super.admin-posts', compact('posts'));
    }

    public function create(){
        return view('super.admin-create');
    }

    public function store(){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'picture'=>'file',
            'content'=>'required',
            'short_description'=>'required'
        ]);

        if(request('picture')){
            $inputs['picture'] = request('picture')->store('/public/images');
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('cmessage', 'Post was created!');

        return back();
    }

    public function destroyPost($post){

//        unlink(Post::findOrFail($post)->picture);
        Post::findOrFail($post)->delete();

        Session::flash('dmessage', 'Post was deleted!');

        return back();
    }

    public function destroyUser($id){

        User::findOrFail($id)->delete();

        return back()->with('dmessage', 'User has been deleted!');
    }

    public function edit($id){

        $value = Post::find($id);

        return view('super.admin-edit', ['id' => $id, 'value' => $value]);
    }

    public function update($id){

        $uid = Post::all()->find($id)->user_id;

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'picture'=>'file',
            'content'=>'required',
            'short_description'=>'required'
        ]);

        if(request('picture')){
            unlink(Post::all()->find($id)->picture);
            $inputs['picture'] = request('picture')->store('/public/images');
        }

        Post::all()->find($id)->update($inputs);

        return redirect()->route('s-users-posts', $uid)->with('cmessage', 'User\'s post is updated');
    }

    public function users(){

        $users = User::all();

        return view('super.admin-users', compact('users'));
    }
    public function usersPosts($id){

        $user = User::findOrFail($id);
        $posts = User::findOrFail($id)->posts;

        return view('super.admin-users-posts', compact('posts', 'user'));
    }
}
