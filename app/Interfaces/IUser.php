<?php

namespace App\Interfaces;


interface IUser
{
    public function getUserByEmail($data);

    public function create($data);

    public function update($userObj, $data);

    public function getUser($userId);

    public function getUsers($userId);

}
