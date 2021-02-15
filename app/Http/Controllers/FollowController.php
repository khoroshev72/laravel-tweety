<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->follow($user);

        return redirect()->back();
    }

    public function delete(User $user)
    {
        auth()->user()->unFollow($user);

        return redirect()->back();
    }
}
