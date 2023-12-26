<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::findorFail($userId);
        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password

        $user = User::where('name', $name)
            ->where('email', $email)
            ->first();

        if (!$user) {
            $password = Str::random(8);

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password), // Hash the password using bcrypt
            ]);
        }

        return view('users.show', compact('user'));
    }


    public function check_update($name, $email)
    {

        $user = User::where('name', $name)
            ->update([
                'email' => $email
            ]);
        if (!$user) {
            $password = str_random(8);

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        }
        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        // Insert Eloquent statement here
        $user = User::destroy($request->users);

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
