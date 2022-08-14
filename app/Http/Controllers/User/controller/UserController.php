<?php

namespace App\Http\Controllers\User\controller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $service;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }
    public function index(Request $request)
    {
        $type = $request->type === null ? 'DESC' : $request->type;
        $perPage = $request->perPage === null ? 10 : $request->perPage;
        $orderBy = $request->orderBy === null ? 'users.id' : $request->orderBy;
        $search = $request->search === null ? '' : $request->search;

        $users = $this->userService->getAllUsers($orderBy, $type, $perPage, $search);
        return $this->responseWithData($users);

    }
    public function userDetail(Request $request,$id)
    {
        $user = $this->userService->getUserInfo($id);
        return $this->responseWithData($user);
    }




}

