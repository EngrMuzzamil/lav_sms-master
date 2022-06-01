<?php

namespace App\Repositories;


use App\Models\Session;


class SessionRepo
{

    public function all()
    {
        return Session::orderBy('id', 'asc')->get();
    }


    public function find($id)
    {
        return Session::find($id);
    }

    public function create($data)
    {
        return Session::create($data);
    }

    public function update($id, $data)
    {
        return Session::find($id)->update($data);
    }

    public function delete($id)
    {
        return Session::destroy($id);
    }




}
