<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {

        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'password' => Hash::make(Str::random(24))
            ]
        );
        Auth::login($user, true);
        return redirect('/dashboard');
    }


    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId())
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }

    //     $facebookbUser = Socialite::driver('facebook')->user();

    //     $user = User::where('facebook_id', $facebookbUser->id)->first();
    //     if ($user) {
    //         $user->update([
    //             'name' => $facebookbUser->name,
    //             'email' => $facebookbUser->email,
    //         ]);
    //     } else {
    //         $user = User::create([
    //             'facebook_id' => $facebookbUser->id,
    //         ]);
    //     }
    //     Auth::login($user);
    //     return redirect('/dashboard');
    // }
}
}
