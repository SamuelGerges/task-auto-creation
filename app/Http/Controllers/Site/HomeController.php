<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositry;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $userRepositry;
    public function __construct(UserRepositry $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }

    public function index()
    {
        $userid= auth()->user()->id;
        $users = $this->userRepositry->getUsers($userid);
        return view('admin.home',compact('users'));
    }
}
