<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')->latest()->limit(3)->get();

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
            ['password' => bcrypt(Str::random(8))]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        $user = User::updateOrCreate([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(Str::random(8))
        ]);

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
