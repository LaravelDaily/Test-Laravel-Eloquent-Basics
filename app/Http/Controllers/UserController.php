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
        $users = User::all()
            ->whereNotNull('email_verified_at')
            ->toQuery()->limit('3')
            ->orderByDesc('created_at')
            ->paginate('3');
        // replace this with Eloquent statement

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        if ((User::find($userId)) !== 1){
            $id_check = User::where('id',$userId)->firstOrFail();
            $id = $id_check->id;
            $user =User::find($id);

            return view('users.show', compact('user'));
        }
        else {
            return abort(404);
        }
        // TASK: find user by $userId or show "404 not found" page
    }

    public function check_create($name, $email)
    {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::firstOrCreate([
            'name' => $name,
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
         // updated or created user
        $user = User::firstOrCreate([
            'name' => $name,
        ],[
            'email' => $email,
            'password' => Hash::make(Str::random()),
        ]);

        if (! $user->wasRecentlyCreated) {
            $user->update([
                'email' =>  $email,
            ]);
        }

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]

//        $check_id = User::where('id',$request->users);
//        $id = $check_id->id;

        User::query()
            ->whereIn('id',$request->users)
            ->delete();

        // Insert Eloquent statement here

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
