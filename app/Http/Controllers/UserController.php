<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')->orderByDesc('created_at')->limit(3)->get();

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
            ['name' => $name, 'email' => $email],
            ['password' => bcrypt('password')]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        $user = User::where('name', $name)->first();

        $user!== null
        ? $user->update(['email' => $email])
        : $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt('password')]);

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        User::destroy($request->users);

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
