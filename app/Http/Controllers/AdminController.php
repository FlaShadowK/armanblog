<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    public function edit($post){

        $value = Post::findBySlug($post);

        return view('panel.admin-edit', ['post'=> $post, 'value'=>$value]);
    }

    public function update(Post $post){

        $inputs = request()->validate([

            'title'=>'required|max:255',
            'picture'=>'file',
            'content'=>'required',
            'short_description'=>'required'
        ]);


        if(request('post_image')){
            $inputs['picture'] = request('picture')->store('/public/images');
            $post->picture = $inputs['picture'];
        }

        $post->title = $inputs['title'];
        $post->content = $inputs['content'];
        $post->short_description = $inputs['short_description'];

        auth()->user()->posts()->whereId($post->id)->save($post);

        Session::flash('umessage', 'Post was updated!');

        return redirect()->route('a-posts');
    }
}
