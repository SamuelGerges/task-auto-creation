<?php

namespace App\Repositories;

use  App\Interfaces\IUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepositry implements IUser
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
        return $this->getUser($user->id);
    }

    public function update($userObj, $data){
        $userObj->update($data);
    }

    public function getUser($userId)
    {
        return User::query()
            ->select('id','user_name','user_email','user_phone')
            ->where('id', '=', $userId)
            ->limit(1)
            ->first();
    }

    public function getUsers($userId)
    {
        return User::query()
            ->select('id','user_name','user_email','user_phone')
            ->where('id','<>',$userId)
            ->groupBy('user_email')
            ->get();
    }

}
