<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // TASK: turn this SQL query into Eloquent
        // select * from users
        //   where email_verified_at is not null
        //   order by created_at desc
        //   limit 3

        $users = User::whereNotNull('email_verified_at')->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get(); // replace this with Eloquent statement

        return view('users.index', compact('users'));
    }

    /**
     * @param $userId
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId); // TASK: find user by $userId or show "404 not found" page

        return view('users.show', compact('user'));
    }

    /**
     * @param $name
     * @param $email
     */
    public function checkCreate($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::firstOrCreate(['name' => $name, 'email' => $email], ['password' => Hash::make(Str::random(10))]);

        return view('users.show', compact('user'));
    }

    /**
     * @param $name
     * @param $email
     */
    public function checkUpdate($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        $user = User::updateOrCreate(['name' => $name], ['email' => $email, 'password' => 'password']); // updated or created user

        return view('users.show', compact('user'));
    }

    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here
        User::destroy($request->users);

        return redirect('/')->with('success', 'Users deleted');
    }

    public function onlyActive()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        $users = User::active()->get();

        return view('users.index', compact('users'));
    }

}
