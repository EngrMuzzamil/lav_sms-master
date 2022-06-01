<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use Illuminate\Http\Request;
use App\Repositories\SessionRepo;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepo;

class SessionController extends Controller
{
    protected $my_class, $user;

    public function __construct(SessionRepo $my_class, UserRepo $user)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    public function index()
    {

        $d['session'] = $this->my_class->all();
        return view('pages.support_team.sessions.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $this->my_class->create($data);

        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['s'] = $s = $this->my_class->find($id);


        return is_null($s) ? Qs::goWithDanger('sessions.index') :view('pages.support_team.sessions.edit', $d);
    }

    public function update(Request $req, $id)
    {
        $data = $req->only(['name']);
        $this->my_class->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {

        $this->my_class->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
