<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function getAllUsers()
    {
        // Use the 'with' method to eager load the 'comments' relationship
        $usersWithComments = User::with('comments')->get();

        return view('users', ['usersWithComments' => $usersWithComments]);
    }

    public function getAllProfiles()
    {
        $userProfiles = User::with('profiles')->get();
        return view ('profile', ['userProfiles' => $userProfiles]);
    }
}
