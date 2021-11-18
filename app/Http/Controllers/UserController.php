<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $users = User::whereNotNull('email_verified_at')
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get(); // replace this with Eloquent statement

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
            ['name' => $name, 'email' => $email],
            ['password' => Hash::make('random')]
        );

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TASK: find a user by $name and update it with $email
        //   if not found, create a user with $name, $email and random password
        
        $user = User::firstOrCreate(
            ['name' => $name],
            ['password' => Hash::make('random'), 'email' => $email]
        );
        
        $user->email = $email;
        $user->save();
        
        
        /*
        
        $user = User::where('name', $name)->first();

        $user!== null
        ? $user->update(['email' => $email])
        : $user = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt('password')]);
        
        */

        
        /*
        $user = User::updateOrCreate(
            ['name' => $name],
            ['email' => $email]
        ); // updated or created user
        */
        
        /*
        Flight::upsert([
            ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
            ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
        ], ['departure', 'destination'], ['price']);
        */

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TASK: delete multiple users by their IDs
        // SQL: delete from users where id in ($request->users)
        // $request->users is an array of IDs, ex. [1, 2, 3]
        
        //User::whereIn('id', $request->users)->delete();//это тоже работает
        User::destroy($request->users);

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
