<?php

namespace App\Services;

use Illuminate\Http\Request;

interface Service
{
    public function store(array $data);
    public function findInstance(int $id);
    public function getTypeRequest(Request $request);
    public function getSearchRequest(Request $request);
    public function delete(int $id);
    public function update(int $id , array $data);
    public function getAll();


}
