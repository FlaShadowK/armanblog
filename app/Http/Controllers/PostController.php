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

    public function index()
    {

        //Morao sam da prepakujem arraj iz Posts::all u drugi jer mi je davao neki eloquent error (Slika 1)

        $i = 0;

        $posts1 = Post::all();

//        return dd($posts1);


        foreach ($posts1 as $post1) {
            $posts2[$i++] = $post1;
        }

        $posts = array_reverse($posts2);

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

        if (empty($posts[0])) {
            return view('blogs');
        }

        return view('blogs', ['posts'=>$posts]);

    }

    public function blog($slug){

        $blog = Post::findBySlugOrFail($slug);

        return view('post', ['post'=>$blog]);

    }


}
