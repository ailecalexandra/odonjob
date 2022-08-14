<?php

namespace App\Http\Controllers\Admin\repository;

use App\Http\Controllers\Admin\service\AdminService;
use App\Models\Admin;
use App\Repositories\Repository;
use App\Services\Service;

class AdminRepository extends Repository implements Service, AdminService
{
    public function __construct()
    {
        $this->model = new Admin();
    }
    public function getAllAdmins(string $orderBy, string $type, int $perPage, string $search = '')
    {
        return $this->model->query()
            ->search($search)
            ->orderBy($orderBy,$type)
            ->paginate($perPage);
    }
    public function getAdminInfo(int $id)
    {
     $admin = $this->findInstance($id);
     if (!empty($admin)){
         return $admin;
     }
     return 'error';

    }
}
