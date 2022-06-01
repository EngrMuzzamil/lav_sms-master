<?php

namespace App\Repositories;


use App\Models\Setting;
use App\Models\CustomFields;

class SettingRepo
{
    public function update($data)
    {

        return Setting::where('id', 20)->update($data);
    }

    public function storefield($data)
    {

        return CustomFields::create($data);
    }

    public function getFields()
    {
        return CustomFields::all();
    }

    public function all()
    {
        return Setting::all();
    }

    public function destroyField($id){

        return CustomFields::where('id',$id)->delete();

    }

    public function updatefield($id,$data){

        return CustomFields::where('id',$id)->update($data);


    }

    public function getSingleField($id ){
        return CustomFields::where('id',$id)->get();

    }
}
