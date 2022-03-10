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
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here

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
