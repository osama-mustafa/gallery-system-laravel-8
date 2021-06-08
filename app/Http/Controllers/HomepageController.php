<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tag;
use App\Models\User;


class HomepageController extends Controller
{
    
    public function index()
    {
        $images = Image::orderBy('created_at', 'DESC')->paginate(8);
        return view('front.index')->with([
            'images' => $images
        ]);
    }

    public function singleImage($imageSlug)
    {
        $image          = Image::where('slug', $imageSlug)->firstOrFail();
        $imagePath      = public_path('img') . '/' . $image->name;
        $relatedImages  = Image::inRandomOrder()->limit(4)->get();

        $image->increment('view_count');

        $imageDimensions = getimagesize($imagePath);
      
        return view('front.single-image')->with([
            'image'             => $image,
            'imageDimensions'   => $imageDimensions,
            'relatedImages'     => $relatedImages
        ]);

    }

    public function downloadImage($imageName)
    {
        $image = Image::where('name', $imageName)->firstOrFail();
        $file = public_path('img/') . $image->name;
        $name = basename($file);
        return response()->download($file, $name);
    }


    public function aboutPage() 
    {
        return view('front.about-page');
    }


    public function searchEngine(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $query = filter_var($request->search, FILTER_SANITIZE_STRING) ;
        $searchResults = Image::where('title', 'LIKE', "%{$query}%")->get();
        return view('front.search-page')->with([
            'searchResults' => $searchResults,
            'query' => $query
        ]);
    }
    

    public function viewImagesWithTag($tagName)
    {
        $tag = Tag::where('name', $tagName)->firstOrFail();
        return view('front.tag-page')->with([
            'tag' => $tag
        ]); 
    }

    public function authorPage($userName)
    {
        $user = User::where('name', $userName)->first();
        return view('front.author-page')->with([
            'user' => $user
        ]);

    }

}
