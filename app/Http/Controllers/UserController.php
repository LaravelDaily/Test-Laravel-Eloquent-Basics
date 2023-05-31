<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        $users = User::whereNotNull('email_verified_at') // replace this with Eloquent statement
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return abort(404);
        }
        
        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password

        $user = User::where('name', $name)->where('email', $email)->first();
        
            if(!$user){
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Str::random(10),
                ]);
            }

            
        return view('users.show', compact('user'));
    }
    
    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        // updated or created user

        $user = User::where('name', $name)->first();

        if($user){
            $user->email = $email;
            $user->save();
        }
        
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Str::random(10),
        ]);

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here
        User::whereIn('id', $request->users)->delete();

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TASK: That "active()" doesn't exist at the moment.
        //   Create this scope to filter "where email_verified_at is not null"
        $users = User::whereNotNul('email_verified_at')->get();

        return view('users.index', compact('users'));
    }

}
