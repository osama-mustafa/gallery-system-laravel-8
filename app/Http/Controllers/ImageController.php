<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['create', 'store', 'edit', 'update']);
    }

   
    public function index()
    {
        $images = Image::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.images.index')->with([
            'images' => $images
        ]);
    }


    public function create()
    {
        $tags = Tag::all();
        return view('admin.images.create')->with([
            'tags' => $tags
        ]);
    }


    public function store(ImageRequest $request)
    {
        $imageName     = $request->file->getClientOriginalName();
        $imageNewName  = time() . $imageName;
        $request->file->move(public_path('img'), $imageNewName);

       $image = Image::create([
           'name'           => $imageNewName,
           'user_id'        => auth()->user()->id,
           'title'          => $request->title,
           'description'    => $request->description 
       ]);

       $image->tags()->sync($request->input('tags'));
       return back()->with([
           'message' => 'Image has been uploaded successfully!'
       ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($imageId)
    {
        $imageTags  = [];
        $image      = Image::findOrFail($imageId);
        $imageTags  = $image->tags->pluck('id')->toArray(); 
        $tags       = Tag::all();
        return view('admin.images.edit')->with([

            'image'     => $image,
            'tags'      => $tags,
            'imageTags' => $imageTags
        ]);
    }

  
    public function update(Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);
        $request->validate([
            'title' => 'required'
        ]);
        $image->slug  = null;
        $image->title = $request->title;
        $image->tags()->sync($request->input('tags'));
        $image->save();
        return back()->with([
            'message' => 'Image has been updated successfully!'
        ]);
    }


    public function destroy($imageId)
    {
        $image = Image::findOrFail($imageId);
        $image->delete();
        return back()->with([
            'message' => 'Image has been deleted successfully'
        ]);
    }


    public function viewTrashedImages()
    {
        $images = Image::onlyTrashed()->paginate(4);
        return view('admin.images.trashed')->with([
            'images' => $images
        ]);
    }


    public function restoreTrashedImage($imageId)
    {
        $image = Image::withTrashed()->findOrFail($imageId);
        $image->restore();
        return back()->with([
            'message' => 'Image has been restored successfully!'
        ]);
    }


    public function deleteTrashedImage($imageId)
    {
        $image = Image::withTrashed()->findOrFail($imageId);
        $imagePath = public_path('img/') . $image->name;
        unlink($imagePath);
        $image->forceDelete();
        return back()->with([
            'message' => 'Image has been deleted permanently and cannot be restored'
        ]);
    }

}