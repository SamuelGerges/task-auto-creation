<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class HomeController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $userid = auth()->user()->id;
        $users  = $this->userService->getHomepage($userid);

        if (isset($users["error"])) {
            session()->flash('error', $users["error"]);
            return redirect()->back();
        }

        return view('site.home', compact('users'));
    }

    public function changeBlockInAccount($id)
    {
        $user = $this->userService->changeBlockInAccount($id);

        if (isset($user["error"]) ){
            session()->flash('error', $user["error"]);
            return redirect()->back();
        }

        session()->flash('success' , $user["success"]);
        return redirect()->back();
    }
}
