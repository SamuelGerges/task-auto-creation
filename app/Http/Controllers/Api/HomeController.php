<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponsesHelper;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users  = $this->userService->getHomepage();

        return ResponsesHelper::returnData($users["success"]["users"]);
    }

    public function changeBlockInAccount($id)
    {
        $user = $this->userService->changeBlockInAccount($id);

        if (isset($user["error"])) {
            return ResponsesHelper::returnError(
                Response::HTTP_NOT_EXTENDED,
                $user["error"]
            );
        }
        return ResponsesHelper::returnSuccessMessage(
            Response::HTTP_OK,
            $user["success"]
        );

    }
}
