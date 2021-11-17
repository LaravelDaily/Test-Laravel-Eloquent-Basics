<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\{Hash, Log, Validator};
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

        $users = User::query()
            ->whereNotNull('email_verified_at')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::query()->findOrFail($userId); // TASK: find user by $userId or show "404 not found" page

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::query()
            ->firstOrCreate([
                'name'  => $name,
                'email' => $email,
            ],[
                'password' => Hash::make(Str::random()),
            ]);

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        $user = User::query()
            ->firstOrCreate([
                'name'  => $name,
            ],[
                'email' => $email,
                'password' => Hash::make(Str::random()),
            ]);

        if (! $user->wasRecentlyCreated) {
            $user->update([
                'email' => $email,
            ]);
        }

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

        User::query()
            ->whereIn('id', $request->users)
            ->delete();

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
