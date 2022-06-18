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

        $posts = Post::all();

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

        return back();
    }

    public function destroy($post){

        Post::findOrFail($post)->delete();

        Session::flash('dmessage', 'Post was deleted!');

        return back();
    }

    public function edit($id){

        $value = Post::find($id);

        return view('panel.admin-edit', ['id' => $id, 'value' => $value]);
    }

    public function update($id){

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

        Session::flash('cmessage', 'Post was created!');

        return redirect()->route('a-posts');
    }

    public function aboutEdit(){

        $about = Auth::user()->find(1)->about;
        $picture = Auth::user()->find(1)->picture;

        return view('panel.admin-edit-about', compact('about', 'picture'));

    }

    public function aboutUpdate(){

        $inputs = request()->validate([
            'about'=>'required',
//            'picture'=>'file'
        ]);

        if(request('picture')){
            unlink(Auth::user()->picture);
            $inputs['picture'] = request('picture')->store('/public/about');
        }

        Auth::user()->about = $inputs['about'];
        if (!empty($inputs['picture'])){
        Auth::user()->picture = $inputs['picture'];
        }
        Auth::user()->update();

        return redirect()->route('about');
    }
}
