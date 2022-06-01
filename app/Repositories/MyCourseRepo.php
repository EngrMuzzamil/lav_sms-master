<?php

namespace App\Repositories;


use App\Models\MyCourse;


class MyCourseRepo
{

    public function all()
    {
        return MyCourse::orderBy('name', 'asc')->get();
    }


    public function find($id)
    {
        return MyCourse::find($id);
    }

    public function create($data)
    {
        return MyCourse::create($data);
    }

    public function update($id, $data)
    {
        return MyCourse::find($id)->update($data);
    }

    public function delete($id)
    {
        return MyCourse::destroy($id);
    }




}
