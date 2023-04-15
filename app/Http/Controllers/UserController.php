<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        // TASK: turn this SQL query into Eloquent
        // select * from users
        //   where email_verified_at is not null
        //   order by created_at desc
        //   limit 3

        $query =
            'SELECT * FROM users WHERE email_verified_at IS NOT NULL ORDER BY created_at DESC LIMIT 3';
        $users = DB::select($query);
        // replace this with Eloquent statement

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId); // TASK: find user by $userId or show "404 not found" page
        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::firstOrCreate(
            ['name' => $name, "email" => $email],
            ['password' => Hash::make(Str::random(8))],

        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password

        // We cannot use updateOrCreate because it updates the password if the user is found, which is not the behavior we want.
        $user = User::where('name', $name)->firstOr(function () use ($name, $email) {
            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(Str::random(8))
            ]);
        });

        if ($user->email != $email) {
            $user->email = $email;
            $user->save();
        }


        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]
        $users = implode(', ', $request->users);
        $query = "DELETE from users WHERE id IN ({$users})";
        // Insert Eloquent statement here
        DB::statement($query);
        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        $users = User::all()->whereNotNull('email_verified_at');
        return view('users.index', compact('users'));
    }
}
