<?php

namespace App\Http\Controllers\SupportTeam;
use Illuminate\Http\Request;
use App\Helpers\Qs;

use App\Repositories\MyCourseRepo;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;

class MyCoursesController extends Controller
{
    protected $my_course, $user;

    public function __construct(MyCourseRepo $my_course, UserRepo $user)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_course = $my_course;
        $this->user = $user;
    }

    public function index()
    {
        $d['my_courses'] = $this->my_course->all();


        return view('pages.support_team.courses.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $mc = $this->my_course->create($data);



        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['c'] = $c = $this->my_course->find($id);

        return is_null($c) ? Qs::goWithDanger('courses.index') : view('pages.support_team.courses.edit', $d) ;
    }

    public function update(Request $req, $id)
    {
        $data = $req->only(['name']);
        $this->my_course->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $this->my_course->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
