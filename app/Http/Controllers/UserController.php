<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // TASK: turn this SQL query into Eloquent
        // select * from users
        //   where email_verified_at is not null
        //   order by created_at desc
        //   limit 3

        $users = User::whereNotNull('email_verified_at')->orderByDesc('created_at')->limit(3)->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        // TASK: find user by $userId or show "404 not found" page
        $user = User::findOrFail($userId);

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::firstOrCreate(
            compact('name', 'email'),
            ['password' => Hash::make(rand(1000000, 999999999))]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        // $user = NULL; // updated or created user

        $user = User::firstOrNew(
            compact('name'),
            ['password' => Hash::make(rand(1000000, 999999999))]
        )
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
        $users = $request->users;
        //First option
        // foreach ($users as $user) {
        //     User::delete($user);
        // }

        //Second option
        // User::whereIn('id', $users)->delete();

        //Third option
        User::destroy($users);

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
