<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function getDashboard()
    {
        return view('users.dashboard');
    }

    public function getProfile($username)
    {
        $user = User::whereHas('profile', function ($q) use ($username) {
            $q->whereUsername($username);
        })->first();

        return $user ? redirect()->route('individual_user_articles_path', $username) : abort(404);
    }

    public function getIndividualUserStatuses($username)
    {
        $user = User::whereHas('profile', function ($q) use ($username) {
            $q->whereUsername($username);
        })->first();

        $user->load('statuses');

        return view('users.individual-user', compact('user'));
    }

    public function postAddUserAsFriend($username)
    {
        $user = User::whereHas('profile', function ($q) use ($username) {
            $q->whereUsername($username);
        })->first();

        $user->friends()->attach(auth()->user());

        redirect()->to('/');

    }

    public function getAllUsersWithProfiles()
    {
        $users = User::with('profile')->orderBy('name')->paginate(12);

        return view('users.all-users', compact('users'));
    }
}
