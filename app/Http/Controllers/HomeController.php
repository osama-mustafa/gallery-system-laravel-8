<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use App\Models\Tag;


class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $images     = Image::all();
        $users      = User::all();
        $tags       = Tag::all();
        $userImages = auth()->user()->images;
        return view('admin.index')->with([
            'images'        => $images,
            'users'         => $users,
            'tags'          => $tags,
            'userImages'    => $userImages
        ]);
    }

}
