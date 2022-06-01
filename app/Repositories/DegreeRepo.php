<?php

namespace App\Repositories;

use App\Models\Degree;

class DegreeRepo
{

    public function all()
    {
        return Degree::orderBy('id', 'desc')->get();
    }


    public function find($id)
    {
        return Degree::find($id);
    }

    public function create($data)
    {
        return Degree::create($data);
    }

    public function createRecord($data)
    {
        return DegreeRecord::firstOrCreate($data);
    }

    public function update($id, $data)
    {
        return Degree::find($id)->update($data);
    }




}
