<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponsesHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $res  = $this->authService->register($data);
        return ResponsesHelper::returnData(
            [
                "user"  => $res["success"]["user"],
            ],
            Response::HTTP_OK,
            'Registered Successfully'
        );
    }

    public function login(LoginRequest $request)
    {
        $data  = $request->validated();
        $res   = $this->authService->login($data);

        if (isset($res["error"])) {
            return ResponsesHelper::returnError(
                Response::HTTP_NOT_ACCEPTABLE,
                $res["error"]
            );
        }

        $token = $res["success"]["user"]->createToken('api_token')->plainTextToken;

        return ResponsesHelper::returnData([
            "user"  => $res["success"]["user"],
            "token" => $token,
        ]);
    }

    public function logout(Request $request)
    {

//        $request->user()->id

        $id = $request->user()->token()->id;
        $response = $this->authService->logout($id);
        if (isset($res["error"])) {
            return ResponsesHelper::returnError(
                Response::HTTP_NOT_ACCEPTABLE,
                $response["error"]
            );
        }
        return ResponsesHelper::returnData([
            "success"  => $response["success"],
        ]);
    }
}
