<?php

namespace App\Http\Controllers\SupportTeam;
use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Repositories\FacultyRepo;

class FacultyController extends Controller
{
    protected $faculty;

    public function __construct(FacultyRepo $faculty)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->faculty = $faculty;
    }

    public function index()
    {
        $d['faculty'] = $this->faculty->getAll();
        return view('pages.support_team.faculty.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->only(['name', 'description']);
        $this->faculty->create($data);

        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['faculty'] = $faculty = $this->faculty->find($id);

        return !is_null($faculty) ? view('pages.support_team.faculty.edit', $d)
            : Qs::goWithDanger('facultys.index');
    }

    public function update(Request $req, $id)
    {
        $data = $req->only(['name', 'description']);
        $this->faculty->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $this->faculty->find($id)->delete();
        return back()->with('flash_success', __('msg.delete_ok'));
    }
}
