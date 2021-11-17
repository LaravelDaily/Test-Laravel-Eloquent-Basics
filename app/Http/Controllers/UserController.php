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
        // TASK: turn this SQL query into Eloquent
        // select * from users
        //   where email_verified_at is not null
        //   order by created_at desc
        //   limit 3

        $users = User::query()
            ->latest()
            ->active()
            ->limit(3)
            ->get(); // replace this with Eloquent statement

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::query()
            ->where(['name'=>$name, 'email'=>$email])
            ->firstOr(fn () => User::query()->create(['name'=>$name, 'email'=>$email, 'password'=>Str::random(10)]));

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        $user = User::query()
            ->firstOrNew(
                ['email'=>$email],
                ['name' => $name, 'password' => Hash::make(Str::random(10))]
            );

        $user->fill(['email'=>$email,'name'=>$name])->save(); // updated or created user

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]
        $request->validate([
            'users' => ['required','array'],
        ]);

        // Insert Eloquent statement here
        User::query()
            ->whereIn('id',$request->users)
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
