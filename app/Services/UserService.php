<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserService
{
    public function register(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

     public function login(array $data): bool
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return false;
        }

        if (!Hash::check($data['password'], $user->password)) {
            return false;
        }

        Auth::login($user);

        return true;
    }
}
