<?php

namespace App\Http\Controllers\User\service;

use App\Http\Controllers\User\request\StoreUserRequest;

interface UserService
{
    public function getAllUsers(string $orderBy,string $type,int $perPage, string $search = '');
    public function getUserInfo(int $id);
    public function storeUserInfoBasic(StoreUserRequest $request);
    public function findInstance(int $id);


}
