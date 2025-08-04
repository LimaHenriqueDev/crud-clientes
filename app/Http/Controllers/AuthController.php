<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        $this->userService->register($request->validated());
        return redirect('/login')->with('success', 'Cadastro realizado!');
    }

    public function login(LoginRequest $request)
    {
        $success = $this->userService->login($request->validated());

        if (!$success) {
            return back()->withErrors([
                'email' => 'Email ou senha incorretos',
                'password' => 'Email ou senha incorretos'
            ]);
        }

        return redirect('/clients');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
