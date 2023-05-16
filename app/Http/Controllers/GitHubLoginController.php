<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('provider_id', $githubUser->id)->orWhere('email',$githubUser->email)->first();

        if(!$user) {
            $user = User::create([
                'name' => $githubUser->name,
                'username' => $githubUser->nickname,
                'avatar' => $githubUser->avatar,
                'email' => $githubUser->email,
                'provider_id' => $githubUser->id,
            ]);
        }

        Auth::login($user,true);

        return redirect('/')->with('success','Welcome Back!');

    }
}
