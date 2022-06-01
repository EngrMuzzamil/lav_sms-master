<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use Illuminate\Http\Request;

use App\Repositories\DepartmentRepo;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentRepo $department)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->department = $department;

    }

    public function index()
    {
        $d['department'] = $this->department->all();

        return view('pages.support_team.department.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $this->department->create($data);

        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['s'] = $sub  = $this->department->find($id);

        return !is_null($sub) ? view('pages.support_team.department.edit', $d)
            : Qs::goWithDanger('department.index');
//        $d['s'] = $sub = $this->department->find($id);
//
//
//        return is_null($sub) ? Qs::goWithDanger('department.index') : view('pages.support_team.department.edit', $d);
    }

    public function update(Request $req, $id)
    {
        $data = $req->all();
        $this->department->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $this->department->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
