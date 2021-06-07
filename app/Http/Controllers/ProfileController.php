<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function construct()
    {
        $this->middleware('auth');
    }
    

    public function userImages()
    {
        $id         = auth()->user()->id;
        $userImages = Image::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.profile.images')->with([
            'userImages' => $userImages
        ]);
    }


    public function editProfile()
    {
        $user = auth()->user();
        return view('admin.profile.settings')->with([
            'user' => $user
        ]);
    }


    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name'  => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();
        return back()->with([
            'message' => 'User has been updated succesfully'
        ]);
        
    }


    public function editYourOwnImage($imageId)
    {

        $image = Image::findOrFail($imageId);
        return view('admin.profile.edit-image')->with([
            'image' => $image,
        ]);
    }

    public function updateYourOwnImage(Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);
        $request->validate([
            'title' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        $image->save();
        return back()->with([
            'message' => 'Image has beem updated successfully'
        ]);
    }


    public function editPassword()
    {
        return view('admin.profile.edit-password');
    }
    

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $hashedPassword = $user->password;
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|confirmed',
        ]);
        if (Hash::check($request->password, $hashedPassword)) {

            $user->password = Hash::make($request->newpassword);
            $user->save();
            return back()->with([
                'success_message' => 'The New Password Has Been Set Correctly'
            ]);

        } else {
            return back()->with([
                'error_message' => 'Please Enter Your Old Password Correctly'
            ]);
        }
    }
}
