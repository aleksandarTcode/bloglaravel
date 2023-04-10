<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit(User $user)
    {
        return view('account.edit', ['user' => $user]);
    }

    public function update(User $user)
    {


        $attributes = request()->validate([
            'username' => 'required',
            'avatar' => $user->exists ? ['image'] : ['required', 'image'],
        ]);

            if (isset($attributes['avatar'])) {
                $attributes['avatar'] = request()->file('avatar')->store('avatars');
            }


        $user->update($attributes);

        return back()->with('success', 'Account updated!');
    }
}
