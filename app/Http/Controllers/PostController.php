<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function index(){

        $posts = Post::all();

        return view('index', ['posts' => $posts]);

    }

    public function about(){

        //Vidi trello :D

        $user = User::findOrFail(1);

        return view('about', ['user'=>$user]);

    }

    public function contact(){

        $content = request();

        return view('contact');

    }

    public function contactMessage(){

        $content = request()->validate([

            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'messages'=>'required'

        ]);

        Mail::send('mail.contact-poruka', $content, function($message){

            $message->to('oarman93sk@gmail.com', 'Arman')->subject('Poruka korisnika vaseg personalnog sajta.');

        });

        Session::flash('mail-message', 'Vasa poruka je poslata.');

        return back();

    }

    public function post(){

        return view('post');

    }

    public function blogs(){

        $posts = Post::paginate(4);

        return view('blogs', ['posts'=>$posts]);

    }

    public function blog($slug){

        $blog = Post::findBySlugOrFail($slug);

        return view('post', ['post'=>$blog]);

    }


}
