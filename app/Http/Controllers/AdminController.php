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

    public function edit($id){

        $value = Post::find($id);

        return view('panel.admin-edit', ['id' => $id, 'value' => $value]);
    }

//    public function update($post){
////      return dd($post);
//        $inputs = request()->validate([
//
//            'title'=>'required|max:255',
//            'content'=>'required',
//            'short_description'=>'required'
//        ]);
//
//        $posts = new Post;
//
//        if(request('post_image')){
//            $inputs['picture'] = request('picture')->store('/public/images');
//            $posts->picture = $inputs['picture'];
//        }
//
////        return dd($post->picture);
//
//        $posts->title = $inputs['title'];
//        $posts->content = $inputs['content'];
//        $posts->short_description = $inputs['short_description'];
//
////        dd($posts);
//        auth()->user()->posts()->whereId($post)->save($posts);
//
//        Session::flash('umessage', 'Post was updated!');
//
//        return redirect()->route('a-posts');
//    }

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

//        auth()->user()->posts()->whereId($id)->save($inputs);
        Post::all()->find($id)->update($inputs);

        Session::flash('cmessage', 'Post was created!');

        return redirect()->route('a-posts');
    }

}
