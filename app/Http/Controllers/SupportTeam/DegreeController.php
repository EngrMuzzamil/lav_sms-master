<?php

namespace App\Http\Controllers\SupportTeam;

use Illuminate\Http\Request;
use App\Repositories\DegreeRepo;
use App\Http\Controllers\Controller;
use App\Helpers\Qs;

class DegreeController extends Controller
{
    protected $degree;

    public function __construct(DegreeRepo $degree )
    {
        $this->degree = $degree;

        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);
    }

    public function index()
    {
         $d['degree'] = $this->degree->all();

        return view('pages.support_team.degree.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();

        $this->degree->create($data);
        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {

        $d['degree'] = $this->degree->find($id);
        return view('pages.support_team.degree.edit', $d);


    }

    public function update(Request $req, $id)
    {
        $data = $req->all();

        $this->degree->update($id, $data);
        return back()->with('flash_success', __('msg.update_ok'));
    }

    public function destroy($id)
    {
        $this->degree->deleteGrade($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
