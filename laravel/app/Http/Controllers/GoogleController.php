<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Nếu chưa có user, tạo mới
            $user = User::create([
                'name' => $googleUser->getName() ?? $googleUser->getEmail(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(16)), // Mật khẩu ngẫu nhiên
                'google_id' => $googleUser->id,
            ]);
        }

        Auth::login($user);

        return redirect('/'); // Hoặc redirect đến trang dashboard, profile,...
    }
}
