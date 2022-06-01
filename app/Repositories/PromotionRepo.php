<?php

namespace App\Repositories;

use App\Models\Degree;
use App\Models\Promotion;
use App\Models\StudentCourseInfo;

class PromotionRepo
{

    public function all()
    {
        return Promotion::orderBy('id', 'desc')->get();
    }

    public function getCurrentSessionStudents($req)
    {
        $pr_ids =  Promotion::select('std_id')->where(['semester_id'=>$req->semester_id,'session_id'=>$req->session_id])->get()->toArray();
         return StudentCourseInfo::select('id','student_name','roll_no')->whereIn('id',$pr_ids)->get();

    }

    public function getPromotedStudents($req){

         $pr_ids =  Promotion::select('std_id')->where(['semester_id'=>$req->semester_id,'session_id'=>$req->session_id])->get()->toArray();
      return   StudentCourseInfo::select('id','student_name','roll_no')->whereIn('id',$pr_ids)->get();



    }


    public function find($id)
    {
        return Promotion::find($id);
    }

    public function create($data)
    {

        foreach ($data->student_ids as $val):
            Promotion::create([
                'std_id'=>$val,
                'session_id'=>$data->session_id,
                'semester_id'=>$data->p_semester_id,
            ]);
        endforeach;

    }

    public function update($id, $data)
    {
        return Promotion::find($id)->update($data);
    }




}
