<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Repositories\StudentRepo;
use App\Repositories\PromotionRepo;
use Illuminate\Http\Request;


class PromotionController extends Controller
{
    protected $promotion, $student;

    public function __construct(PromotionRepo $promotion, StudentRepo $student)
    {
        $this->middleware('teamSA');

        $this->promotion = $promotion;
        $this->student = $student;
    }

    public function promotion()
    {
        $d['sessions'] = $this->student->session();
        $d['semester'] = $this->student->semester();
       return view('pages.support_team.students.promotion.index', $d);
    }


    public function getCurrentStudents(Request $req){

        return $this->promotion->getPromotedStudents($req);
    }


    public function getPromotedStudents(Request $req){

        return $this->promotion->getPromotedStudents($req);

    }
    public function addPromotion(Request $req){

       $this->promotion->create($req);
        return Qs::jsonStoreOk();


    }





}
