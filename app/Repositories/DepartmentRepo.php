<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepo
{

    public function all()
    {
        return Department::orderBy('id','desc')->get();
    }

    public function create($data)
    {
        return Department::create($data);
    }

    public function find($id)
    {
        return Department::find($id);
    }


    public function update($id, $data)
    {
        return Department::find($id)->update($data);
    }

    public function delete($id)
    {
        return Department::destroy($id);
    }




}
