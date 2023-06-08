<?php

namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\IUserRepositry;
use Illuminate\Support\Facades\Hash;

class UserRepositry implements IUserRepositry
{
    public function getUserByEmail($data)
    {
        return User::query()
            ->where('user_email', '=', $data['user_email'])
            ->limit(1)
            ->first();
    }

    public function create($data)
    {
        $user = User::create([
            'user_name'  => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_phone' => $data['user_phone'],
            'password'   => Hash::make($data['password']),
        ]);
        return $this->getUserById($user->id);
    }

    public function update($userObj, $data)
    {
        $userObj->update($data);
    }

    public function getUserById($userId)
    {
        return User::query()
            ->select('id', 'user_name', 'user_email', 'user_phone', 'is_blocked','login_count')
            ->where('id', '=', $userId)
            ->limit(1)
            ->first();
    }

    public function getUsers()
    {
        return User::query()
            ->select('id', 'user_name', 'user_email', 'user_phone', 'is_blocked')
            ->orderByRaw('user_email, user_phone')
            ->get();
    }

}
