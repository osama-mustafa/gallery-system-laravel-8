<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Models\Image;

use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }


    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with([
            'tags' => $tags
        ]);
    }

   
    public function create()
    {
        return view('admin.tags.index');
    }

   
    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name
        ]);
        return back()->with([
            'message' => 'Tag has been created successfully'
        ]);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        return view('admin.tags.edit')->with([
            'tag' => $tag
        ]);
    }

    
    public function update(Request $request, $tagId)
    {   
        $request->validate([
            'name' => 'required'
        ]);
        $tag = Tag::findOrFail($tagId);
        $tag->name = $request->name;
        $tag->save();
        return back()->with([
            'message' => 'Tag has been updated successfully'
        ]);
    }

    
    public function destroy($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();
        return back()->with([
            'message' => 'Tag has been deleted successfully'
        ]);
    }

}
