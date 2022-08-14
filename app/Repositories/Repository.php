<?php

namespace App\Repositories;

use App\Models\BaseModel;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Repository implements Service
{
    protected $model;
    public function __construct()
    {
        $this->model= new BaseModel();
    }

    public function store(array $data)
    {
        $instance = new $this->model;
        $instance->create($data);
        return $instance;
    }

    public function findInstance(int $id)
    {
        return $this->model->find($id);
    }

    public function getTypeRequest(Request $request)
    {
        return $request->type != null ? $request->type :'DESC';
    }

    public function getSearchRequest(Request $request)
    {
        return $request->search != null ? $request->search :'';
    }

    public function delete(int $id)
    {
        $instance = $this->findInstance($id);
        if(!empty($instance)){
            $instance->delete();
            return $instance;

        }
        return 'Error delete instance';
    }

    public function update(int $id, array $data)
    {
        $instance = $this->findInstance($id);
        if(!empty($instance)){
            $instance->update($data);
            return $instance;

        }
        return 'Error Updating data';
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
