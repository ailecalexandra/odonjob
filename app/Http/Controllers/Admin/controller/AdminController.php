<?php

namespace App\Http\Controllers\Admin\controller;

use App\Http\Controllers\Admin\service\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $service;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function index(Request $request)
    {
        $type = $request->type === null ? 'DESC' : $request->type;
        $perPage = $request->perPage === null ? 10 : $request->perPage;
        $orderBy = $request->orderBy === null ? 'admins.id' : $request->orderBy;
        $search = $request->search === null ? '' : $request->search;

        $admins = $this->adminService->getAllAdmins($orderBy, $type, $perPage, $search);
        return $this->responseWithData($admins);

    }
    public function adminDetail(Request $request,$id)
    {
        $admin = $this->adminService->getAdminInfo($id);
        return $this->responseWithData($admin);
    }

}
