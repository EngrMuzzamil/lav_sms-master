<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Repositories\StudentRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomFields;

use Illuminate\Support\Str;

class StudentRecordController extends Controller
{
    protected $student;

   public function __construct(StudentRepo $student)
   {
       $this->middleware('teamSA', ['only' => ['edit','update', 'reset_pass', 'create', 'store', 'graduated'] ]);
       $this->middleware('super_admin', ['only' => ['destroy',] ]);


        $this->student = $student;
   }

    public function index()
    {

        $data['students']=  $this->student->all();

        return view('pages.support_team.students.list', $data);
    }

    public function create()
    {

        $data['sessions']=$this->student->session();
        $data['courses']=$this->student->courses();
        $data['faculty']=$this->student->Faculty();
        $data['department']=$this->student->Department();
        $data['semester']=$this->student->semester();
        $data['degree']=$this->student->degree();
        $data['fields']=$this->student->fields();


        return view('pages.support_team.students.add', $data);
    }

    public function store(Request $req)
    {

        $this->student->create($req);
        return Qs::jsonStoreOk();
    }


    public function show($sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);

        if(!$sr_id){return Qs::goWithDanger();}

        $data['student'] = $this->student->getRecordByStudentID($sr_id)['info1'][0];
        $data['student_edu'] = $this->student->getRecordByStudentID($sr_id)['info2'];
        $data['student_additional'] = $this->student->getRecordByStudentID($sr_id)['info3'];
        $data['student_session'] = $this->student->getRecordByStudentID($sr_id)['info4'];



        return view('pages.support_team.students.show', $data);
    }

    public function edit($sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);

        if(!$sr_id){return Qs::goWithDanger();}

        $data['sessions']=$this->student->session();
        $data['courses']=$this->student->courses();
        $data['faculty']=$this->student->Faculty();
        $data['department']=$this->student->Department();
        $data['semester']=$this->student->semester();
        $data['degree']=$this->student->degree();
        $data['student'] = $this->student->getRecordByStudentID($sr_id)['info1'][0];
        $data['student_edu'] = $this->student->getRecordByStudentID($sr_id)['info2'];
        $data['student_additional'] = $this->student->getRecordByStudentID($sr_id)['info3'];
        $data['student_session'] = $this->student->getRecordByStudentID($sr_id)['info4'];
        $data['fields']=$this->student->fields();

        return view('pages.support_team.students.edit', $data);
    }

    public function update(Request $req, $sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);
        if(!$sr_id){return Qs::goWithDanger();}

        $this->student->update($sr_id,$req);
        return Qs::jsonStoreOk();


        return Qs::jsonUpdateOk();
    }

    public function destroy($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        if(!$st_id){return Qs::goWithDanger();}

        $this->student->delete($st_id);

        return back()->with('flash_success', __('msg.del_ok'));
    }


    public function promotion(){

       echo 1;
    }

}
