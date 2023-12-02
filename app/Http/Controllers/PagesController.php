<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller{

    public function getIndex() {

        $posts  = Post::orderBy('created_at', 'desc')->limit(3)->get();

        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout(){

        $first = 'Ammar';
        $last = 'Alsiyabi';

        $fullname = $first." ".$last;
        $email = 'alsiyabiomn@gmail.com';

        
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        return view('pages.about')->withData($data);
        
        //return view('pages/about')->with("fullname", $fullname)->with("email", $email);
    }

    public function getContact(){

        return view('pages.contact');
    }
}

