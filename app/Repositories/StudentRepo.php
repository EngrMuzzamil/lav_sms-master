<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\Session;
use App\Models\Promotion;
use App\Models\MyCourse;
use App\Models\StudentCourseInfo;
use App\Models\StudentPersonalInfo;
use App\Models\StudentEducationInfo;
use App\Models\StudentDetailInfo;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Degree;
use App\Models\CustomFields;
use App\Models\StudentAdditionalDetail;


use DB;

class StudentRepo {



    public function all()
    {
        return StudentCourseInfo::get();
    }

    public function session()
    {
        return Session::get();
    }

    public function fields(){

        return CustomFields::get();

    }

    public function courses()
    {
        return MyCourse::get();
    }

    public function Faculty()
    {
        return Faculty::get();
    }

    public function Department()
    {
        return Department::get();
    }

    public function semester()
    {
        return Semester::get();
    }

    public function degree()
    {
        return Degree::get();
    }

    public function create($req)
    {

        $std_course_info = [
            'course_id' => $req->course_id,
            'faculty_id' => $req->faculty_id,
            'department_id' => $req->department_id,
            'student_name' => $req->student_name,
            'roll_no' => $req->roll_no,
            'registration_no' => $req->registration_no,
            'degree_id' => $req->degree_id,
            'admission_date' => $req->admission_date,
            'failed_credit_exam' => $req->failed_credit_exam,
            'remarks' => $req->remarks,
            'readmission' => $req->readmission,
        ];

        $std_id =  StudentCourseInfo::create($std_course_info)->id;
        Promotion::create(['std_id'=>$std_id,'session_id'=>$req->session_id,'semester_id'=>$req->semester_id]);

        $std_personal_info = [
            'std_id'=>$std_id,
            'blood_id'=> $req->blood_id,
            'father_name' => $req->father_name,
            'mother_name' => $req->mother_name,
            'dob' => $req->dob,
            'nid' => $req->nid,
            'gender' => $req->gender,
            'birth_place' => $req->birth_place,
            'guardian_name' => $req->guardian_name,
            'permanent_address' => $req->permanent_address,
            'present_address' => $req->present_address,
            'post_office' => $req->post_office,
            'post_office2' => $req->post_office2,
            'student_contact_no' => $req->student_contact_no,
            'guardian_contact_no' => $req->guardian_contact_no,
            'skills' => $req->skills,
            'tribal' => $req->tribal,
            'fighter' => $req->fighter,
        ];
        StudentPersonalInfo::create($std_personal_info);

        $std_education_info_s = [
            'secondary'=>[
                'std_id'=>$std_id,
                'edu_type' => 'secondary',
                'exam' => $req->s_exam,
                'dept' => $req->s_dept,
                'institute' => $req->s_institute,
                'roll_no' => $req->s_roll_no,
                'registration' => $req->s_registration,
                'session' => $req->s_session,
                'result' => $req->s_result,
            ],
            'higher'=>[
                'std_id'=>$std_id,
                'edu_type' => 'higher',
                'exam' => $req->h_exam,
                'dept' => $req->h_dept,
                'institute' => $req->h_institute,
                'roll_no' => $req->h_roll_no,
                'registration' => $req->h_registration,
                'session' => $req->h_session,
                'result' => $req->h_result,
            ],
            'graduate'=>[
                'std_id'=>$std_id,
                'edu_type' => 'graduate',
                'exam' => $req->g_exam,
                'dept' => $req->g_dept,
                'institute' => $req->g_institute,
                'roll_no' => $req->g_roll_no,
                'registration' => $req->g_registration,
                'session' => $req->g_session,
                'result' => $req->g_result,
            ]];

        StudentEducationInfo::create($std_education_info_s['secondary']);
        StudentEducationInfo::create($std_education_info_s['higher']);
        StudentEducationInfo::create($std_education_info_s['graduate']);

        $std_detail_info = [
            'std_id'=>$std_id,
            'hall_name' => $req->hall_name,
            'room_no' => $req->room_no,
            'supervisor' => $req->supervisor,
            'residential' => $req->residential,

        ];
        StudentDetailInfo::create($std_detail_info);


        $fields = CustomFields::get();
        foreach ($fields as $val){
            $a = str_replace(' ', '', $val->name);
            StudentAdditionalDetail::create(['std_id'=>$std_id,'field_name'=>$val->name,'value'=>$req->$a]);

        }


    }

    public function update($id,$req)
    {
        $std_course_info = [

            'course_id' => $req->course_id,
            'faculty_id' => $req->faculty_id,
            'department_id' => $req->department_id,
            'student_name' => $req->student_name,
            'roll_no' => $req->roll_no,
            'registration_no' => $req->registration_no,
            'degree_id' => $req->degree_id,
            'admission_date' => $req->admission_date,
            'failed_credit_exam' => $req->failed_credit_exam,
            'remarks' => $req->remarks,
            'readmission' => $req->readmission,
        ];

        $std_id =  StudentCourseInfo::where('id',$id)->update($std_course_info);
        Promotion::where('std_id',$id)->update(['session_id'=>$req->session_id,'semester_id'=>$req->semester_id]);
        $std_personal_info = [
            'std_id'=>$id,
            'blood_id'=> $req->blood_id,
            'father_name' => $req->father_name,
            'mother_name' => $req->mother_name,
            'dob' => $req->dob,
            'nid' => $req->nid,
            'gender' => $req->gender,
            'birth_place' => $req->birth_place,
            'guardian_name' => $req->guardian_name,
            'permanent_address' => $req->permanent_address,
            'present_address' => $req->present_address,
            'post_office' => $req->post_office,
            'post_office2' => $req->post_office2,
            'student_contact_no' => $req->student_contact_no,
            'guardian_contact_no' => $req->guardian_contact_no,
            'skills' => $req->skills,
            'tribal' => $req->tribal,
            'fighter' => $req->fighter,
        ];
        StudentPersonalInfo::where('std_id',$id)->update($std_personal_info);

        $std_education_info_s = [
            'secondary'=>[
                'std_id'=>$id,
                'edu_type' => 'secondary',
                'exam' => $req->s_exam,
                'dept' => $req->s_dept,
                'institute' => $req->s_institute,
                'roll_no' => $req->s_roll_no,
                'registration' => $req->s_registration,
                'session' => $req->s_session,
                'result' => $req->s_result,
            ],
            'higher'=>[
                'std_id'=>$id,
                'edu_type' => 'higher',
                'exam' => $req->h_exam,
                'dept' => $req->h_dept,
                'institute' => $req->h_institute,
                'roll_no' => $req->h_roll_no,
                'registration' => $req->h_registration,
                'session' => $req->h_session,
                'result' => $req->h_result,
            ],
            'graduate'=>[
                'std_id'=>$id,
                'edu_type' => 'graduate',
                'exam' => $req->g_exam,
                'dept' => $req->g_dept,
                'institute' => $req->g_institute,
                'roll_no' => $req->g_roll_no,
                'registration' => $req->g_registration,
                'session' => $req->g_session,
                'result' => $req->g_result,
            ]];

        StudentEducationInfo::where('std_id',$id)->where('edu_type','secondary')->update($std_education_info_s['secondary']);
        StudentEducationInfo::where('std_id',$id)->where('edu_type','higher')->update($std_education_info_s['higher']);
        StudentEducationInfo::where('std_id',$id)->where('edu_type','graduate')->update($std_education_info_s['graduate']);

        $std_detail_info = [
            'std_id'=>$id,
            'hall_name' => $req->hall_name,
            'room_no' => $req->room_no,
            'supervisor' => $req->supervisor,
            'residential' => $req->residential,

        ];
        StudentDetailInfo::where('std_id',$id)->update($std_detail_info);

        $fields = CustomFields::get();
        StudentAdditionalDetail::where('std_id',$id)->delete();
        foreach ($fields as $val){
            $a = str_replace(' ', '', $val->name);
            StudentAdditionalDetail::create(['std_id'=>$id,'field_name'=>$val->name,'value'=>$req->$a]);

        }
    }




    public function getRecordByStudentID($id)
    {

        $data = DB::table('student_course_infos')
            ->join('student_detail_infos', 'student_detail_infos.std_id', '=', 'student_course_infos.id')
            ->join('student_personal_infos', 'student_personal_infos.std_id', '=', 'student_course_infos.id')
            ->join('departments', 'departments.id', '=', 'student_course_infos.department_id')
            ->join('my_courses', 'my_courses.id', '=', 'student_course_infos.course_id')
            ->join('faculties', 'faculties.id', '=', 'student_course_infos.faculty_id')
            ->join('degrees', 'degrees.id', '=', 'student_course_infos.degree_id')
            ->join('promotions', 'promotions.std_id', '=', 'student_course_infos.id')
            ->select(
                "student_detail_infos.*",
                "degrees.name as degree",
                "student_course_infos.*",
                "student_personal_infos.*",
                'departments.name as dept',
                'my_courses.name as course',
                'faculties.name as faculty')
            ->where('student_course_infos.id',$id)
            ->get();

        $data2 = StudentEducationInfo::where("std_id",$id)->get();
        $data3 = StudentAdditionalDetail::where("std_id",$id)->get();

        $data4 = DB::table('promotions')
            ->join('sessions', 'sessions.id', '=', 'promotions.session_id')
            ->join('semesters', 'semesters.id', '=', 'promotions.semester_id')
            ->select("sessions.id as session_id","semesters.id as semester_id","sessions.session_start","sessions.session_end","semesters.semester","semesters.year")
            ->where('promotions.std_id',$id)
            ->orderBy('promotions.id','desc')
            ->get();


        return ['info1'=>$data,'info2'=>$data2,'info3'=>$data3,'info4'=>$data4];





    }

    public function delete($id)
    {
        StudentCourseInfo::where('id',$id)->delete();
        StudentPersonalInfo::where('std_id',$id)->delete();
        StudentEducationInfo::where('std_id',$id)->delete();
        StudentDetailInfo::where('std_id',$id)->delete();
        return true;
    }


    /************* Promotions *************/
    public function createPromotion(array $data)
    {
        return Promotion::create($data);
    }

    public function findPromotion($id)
    {
        return Promotion::find($id);
    }

    public function deletePromotion($id)
    {
        return Promotion::destroy($id);
    }

    public function getAllPromotions()
    {
        return Promotion::with(['student', 'fc', 'tc', 'fs', 'ts'])->where(['from_session' => Qs::getCurrentSession(), 'to_session' => Qs::getNextSession()])->get();
    }

    public function getPromotions(array $where)
    {
        return Promotion::where($where)->get();
    }

}
