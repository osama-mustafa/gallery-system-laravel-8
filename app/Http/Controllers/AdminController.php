<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function AddToAdmins($userId) 
    {
        $user = User::findOrFail($userId);
        $user->admin = true;
        $user->save();
        return back()->with([
            'message' => 'User has been added to admins successfully'
        ]);
    }

    public function removeFromAdmins($userId)
    {
        $user = User::findOrFail($userId);
        $user->admin = false;
        $user->save();
        return back()->with([
            'message' => 'User has been removed from admins successfully'
        ]);
    }
}
