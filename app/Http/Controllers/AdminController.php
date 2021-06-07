<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function AddToAdmins($id) 
    {
        $user = User::find($id);
        $user->admin = true;
        $user->save();
        return back()->with([
            'message' => 'User has been added to admins successfully'
        ]);
    }

    public function removeFromAdmins($id)
    {
        $user = User::find($id);
        $user->admin = false;
        $user->save();
        return back()->with([
            'message' => 'User has been removed from admins successfully'
        ]);
    }
}
