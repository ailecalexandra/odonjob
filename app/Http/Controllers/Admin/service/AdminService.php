<?php

namespace App\Http\Controllers\Admin\service;

interface AdminService
{
    public function getAllAdmins(string $orderBy, string $type, int $perPage, string $search = '');
    public function getAdminInfo(int $id);
}
