<?php

namespace App\Repositories;

use App\Models\Faculty;

class FacultyRepo
{

    public function create($data)
    {
        return Faculty::create($data);
    }

    public function getAll($order = 'name')
    {
        return Faculty::orderBy($order)->get();
    }

    public function getFaculty($data)
    {
        return Faculty::where($data)->get();
    }

    public function update($id, $data)
    {
        return Faculty::find($id)->update($data);
    }

    public function find($id)
    {
        return Faculty::find($id);
    }


}
