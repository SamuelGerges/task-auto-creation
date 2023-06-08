<?php

namespace App\Repositories;


interface IUserRepositry
{
    public function getUserByEmail($data);

    public function create($data);

    public function update($userObj, $data);

    public function getUserById($userId);

    public function getUsers();

}
