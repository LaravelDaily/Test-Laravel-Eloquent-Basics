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

        //$users = User::all(); // replace this with Eloquent statement

        $users = User::whereNotNull('email_verified_at')->orderBy('created_at', 'desc')->take(3)->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        //$user = NULL; // TASK: find user by $userId or show "404 not found" page
        $user = User::findOrFail( $userId);

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //  if not found, create a user with $name, $email and random password
        //$user = NULL;

        $user = User::firstOrCreate(
            [
                'name' => $name,
                'email' => $email
            ],
            [
                'name' => $name,
                'email' => $email,
                'password' => Str::random(8),
            ]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        // $user = NULL; // updated or created user

        $user = User::firstWhere( 'name', '=', $name );

        // I´ve done this with the if else condition cause i dont want to update the existing user`s password
        if( $user ){
            $user->email = $email;
            $user->save();
        }else{
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $password = Str::random(8);
            $user->password = Hash::make($password);
            $user->save();
        }

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here
        foreach( $request->users as $deletedUser ){
            User::find( $deletedUser )->delete();
        }

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        // $users = User::active()->get();
        $users = User::whereNotNull('email_verified_at')->get();

        return view('users.index', compact('users'));
    }

}
