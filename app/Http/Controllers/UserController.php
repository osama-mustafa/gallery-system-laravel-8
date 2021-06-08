<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    
    public function create()
    {
        return view('admin.users.create');
    }


    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with([
            'message' => 'User has been created successfully!'
        ]);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    
    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $request->validate([
            'name' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return back()->with([
            'message' => 'User has been updated successfully'
        ]);
    }

    
    public function destroy($id)
    {
        //
    }
}
