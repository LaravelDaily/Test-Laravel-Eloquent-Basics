<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId); // TASK: find user by $userId or show "404 not found" page

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        $user = User::firstOrCreate(compact('name', 'email'), ['password' => Str::random()]);
        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        $user = User::firstOrNew(compact('name'), ['password' => Str::random()]);
        $user->fill(compact('email'))->save();

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        User::whereIn('id', $request->users)->delete();

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        $users = User::active()->get();

        return view('users.index', compact('users'));
    }

}
