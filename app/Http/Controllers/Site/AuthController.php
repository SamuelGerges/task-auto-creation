<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $res  = $this->authService->register($data);
        if ($res["success"]["user"]) {
            return redirect()->route('auth.getLogin');
        }
    }


    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $response = $this->authService->login($data);

        if (isset($response["error"])) {
            session()->flash('error', $response["error"]);
            return redirect()->back();
        }

        if ($response["success"]["user"]) {
            return redirect()->route('site.home');
        }

    }


    public function logout()
    {
        $id = auth()->user()->id;
        $response = $this->authService->logout($id);
        if (isset($response["error"])) {
            session()->flash('error', $response["error"]);
            return redirect()->back();
        }
        return redirect()->route('auth.getLogin');
    }
}
