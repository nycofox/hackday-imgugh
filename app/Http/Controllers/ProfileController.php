<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    //$allmedia = ?? users media?

    public function show(User $user)
    {
        $allmedia = $user->media()->latest()->paginate(12);

        return view('profile', [
            'allmedia' => $allmedia,
            'user' => $user,
        ]);
    }

    /*
     *
     *
     * $allmedia = Media::latest()->paginate(12);

        return view('welcome', [
            'allmedia' => $allmedia,
        ])
     */
}
