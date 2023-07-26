<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

        $users = User::where('email_verified_at', '<>', null)->orderBy('created_at', 'desc')->take(3)->get(); // replace this with Eloquent statement

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::findOrFail($userId);
        
        // TASK: find user by $userId or show "404 not found" page

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        $user = NULL;
        if ( ! User::where('email', $email)->where('name',$name)->exists()) {

            $user = User::create(['name' => $name,'email'=>$email,'password' => Hash::make(Str::random(8))]);
         }

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        $user = NULL; // updated or created user

        if(User::where('name', $name)->exists())
        {
            $user = User::where('name', $name)->update(['email' => $email])->get();
            $user->save();
        }
        else
        {
            $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make(Str::random(8))]);
        }

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here
        User::destroy($request->users);

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        $users = User::active()->whereNotNull('email_verified_at')->get();

        return view('users.index', compact('users'));
    }
}
