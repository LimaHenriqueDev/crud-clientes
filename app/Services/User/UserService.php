<?php
namespace App\Services\User;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserService
{
    
    protected $userRepository;

    public function __construct(UserRepository  $userRepository)
    {
        $this->userRepository = $userRepository;
    }
 
    public function register(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

     public function login(array $data): bool
    {
        $user = $this->userRepository->findByEmail($data['email']);

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
