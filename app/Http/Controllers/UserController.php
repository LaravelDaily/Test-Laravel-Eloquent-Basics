<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')
            ->latest()
            ->take(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId);

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        $user = User::firstOrCreate(
            compact('name', 'email'),
            ['password' => bcrypt('password')]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        $user = User::firstOrNew(compact('name'), ['password' => bcrypt('password')])
            ->fill(compact('email'));
        $user->save();

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        User::destroy($request->users);

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        $users = User::active()->get();

        return view('users.index', compact('users'));
    }
}
