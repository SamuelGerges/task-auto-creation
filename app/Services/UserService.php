<?php

namespace App\Services;

use App\Repositories\IUserRepositry;

class UserService
{
    protected $userRepositry;

    public function __construct(IUserRepositry $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }

    public function getHomepage()
    {
        $users = $this->userRepositry->getUsers();

        return [
            "success" => [
                'users' => $users
            ],
        ];
    }

    public function changeBlockInAccount($id)
    {
        $user = $this->userRepositry->getUserById($id);

        if (!is_object($user) ){
            return [
                "error" => " User Not Existed"
            ];
        }

        $isBlocked = $user->is_blocked == 1 ? null : 1;
        $this->userRepositry->update($user, [
            'fail_number'         => null,
            'can_not_login_until' => null,
            'is_blocked'          => $isBlocked,
        ]);

        return [
            "success" => "User is ".($isBlocked?"Blocked":"Un-Blocked")." Successfully"
        ];
    }

}