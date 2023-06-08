<?php

namespace App\Services;

use App\Repositories\IUserRepositry;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    protected $userRepositry;

    public function __construct(IUserRepositry $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }

    public function register($data)
    {
        $user = $this->userRepositry->create($data);

        return [
            "success" => [
                "message" => "You are registered successfully, please login",
                'data'    => $user
            ],
        ];
    }


    public function login($data)
    {
        $user = $this->userRepositry->getUserByEmail($data);

        if (!is_object($user)) {
            return [
                'error' => 'the email is not existed'
            ];
        }


        if ($user->is_blocked) {
            return [
                'error' => 'you are blocked ',
            ];
        }

        if ($user->can_not_login_until > date('Y-m-d H:i:s')) {
            return [
                'error' => 'you can not login until ' . $user->can_not_login_until,
            ];
        }

        if (!password_verify($data['password'], $user->password)) {

            $user->update([
                'fail_number' => $user->fail_number + 1
            ]);

            //can_not_login_until
            if ($user->fail_number == 3) {
                $can_not_login_until = date('Y-m-d H:i:s', strtotime("+30 second"));
                $this->userRepositry->update($user, [
                    'can_not_login_until' => $can_not_login_until,
                ]);

                return [
                    "error" => 'invalid email or password, try again after 30 seconds in ' . $user->can_not_login_until,
                ];
            }

            if ($user->fail_number > 3) {
                $this->userRepositry->update($user, [
                    'is_blocked' => true,
                ]);

                return [
                    'error' => 'invalid email or password, the account is blocked'
                ];
            }


            return [
                "error" => 'invalid email or password'
            ];
        }

        if ($user->login_count == 2) {
            return [
                "error" => 'you are Logged in from two devices .',
            ];
        }

        $this->userRepositry->update($user, [
            'fail_number'         => null,
            'can_not_login_until' => null,
            'is_blocked'          => null,
            'login_count'         => $user->login_count + 1,
        ]);

        Auth::login($user);

        return [
            "success" => [
                'user'    => $this->userRepositry->getUserById($user->id),
                'message' => "You are Login Successfully"
            ],
        ];

    }

    public function logout($id)
    {
        $user = $this->userRepositry->getUserById($id);

        if (!is_object($user)) {
            return [
                "error" => "Failed in logout",
            ];
        }

        $this->userRepositry->update($user, [
            'login_count' => $user->login_count - 1,
        ]);
        return [
            "success" => "Log out Successfully"
        ];
    }


}
