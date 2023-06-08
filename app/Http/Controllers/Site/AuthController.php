<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

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
        $data      = $request->validated();
        $response  = $this->authService->register($data);

        session()->flash('success', $response["success"]["message"]);


        return redirect()->route('auth.getLogin');
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
        session()->flash('success',$response['success']['message']);
        return redirect()->route('site.home');
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
