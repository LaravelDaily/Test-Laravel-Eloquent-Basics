<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class UserController extends Controller {
    public function index() {
        $users = User::whereNotNull('email_verified_at')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('users.index', compact('users'));
    }

    public function show($userId) {
        $user = User::find($userId); // TASK: find user by $userId or show "404 not found" page

        if ($user) {
            return view('users.show', compact('user'));
        }
        return  abort(404);
    }

    public function check_create($name, $email) {
        // TASK: find a user by $name and $email
        //   if not found, create a user with $name, $email and random password
        $user = User::firstOrCreate([
            'name' => $name,
            'email' => $email,
            'password' => Random::generate(8)
        ]);

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email) {
        $user = User::updateOrCreate(
            ['name' => $name],
            ['email' => $email, 'password' => Random::generate(8)]
        );

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request) {
        foreach ($request->users as $id) {
            User::where('id', $id)
                ->delete();
        }

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active() {
        $users = User::active()->get();

        return view('users.index', compact('users'));
    }
}
