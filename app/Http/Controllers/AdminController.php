<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){

        return view('panel.admin-index');
    }

    public function posts(){

        $posts = Auth::user()->posts;

        return view('panel.admin-posts', compact('posts'));
    }

    public function create(){
        return view('panel.admin-create');
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

        return redirect()->route('a-posts');
    }

    public function destroy($post){

        if(Post::findOrFail($post)->user_id != Auth::user()->id){
            return abort(403);
        }

        unlink(Post::findOrFail($post)->picture);
        Post::findOrFail($post)->delete();

        Session::flash('dmessage', 'Post was deleted!');

        return back();
    }

    public function editPost($id){

        $value = Post::find($id);

        if($value->user_id != Auth::user()->id){
            return abort(403);
        }

        return view('panel.admin-edit', ['id' => $id, 'value' => $value]);
    }

    public function updatePost($id){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'picture'=>'file',
            'content'=>'required',
            'short_description'=>'required'
        ]);

        if(request('picture')){
            unlink(Post::all()->find($id)->picture);
            $inputs['picture'] = request('picture')->store('/storage/images');
        }

        auth()->user()->posts()->find($id)->update($inputs);

        Session::flash('cmessage', 'Post was updated!');

        return redirect()->route('a-posts');
    }

    public function editUser(){
        $value = Auth::user();

        if($value->id != Auth::user()->id){
            return abort(403);
        }
//        dd($value->name);
        return view('panel.admin-user-edit', compact('value'));
    }

    public function updateUser($id){

        $inputs = request()->validate([
            'picture'=>'file',
            'about'=>'required',
        ]);

        if(request('picture')){
            if (!empty(Auth::user()->picture)){
                unlink(Auth::user()->picture);}
            $inputs['picture'] = request('picture')->store('/public/images/pfp');
        }else{
            $inputs['picture'] = Auth::user()->picture;
        }

        Auth::user()->about = $inputs['about'];
        Auth::user()->picture = $inputs['picture'];
        Auth::user()->update($inputs);

        Session::flash('cmessage', 'Profile was updated!');

        return redirect()->route('a-index');
    }

}
