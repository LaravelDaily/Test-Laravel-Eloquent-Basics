<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')
            ->orderBy('created_at', 'DESC')
            ->limit(3)
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
            ['name' => $name, 'email' => $email],
            ['password' => bcrypt(Str::random(20))]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        $user = User::where('name', $name)->first();

        if($user)
        {
            $user->update(['email' => $email]);
        } else {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt(Str::random(20))
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

        User::destroy($request->input('users'));

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
