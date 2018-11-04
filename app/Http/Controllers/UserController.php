<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != NULL) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with(['status' => 'User saved!']);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
