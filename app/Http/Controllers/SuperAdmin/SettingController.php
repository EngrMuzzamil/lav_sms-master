<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $setting, $my_class;

    public function __construct(SettingRepo $setting)
    {
        $this->setting = $setting;

    }

    public function index()
    {
         $d['s'] = $this->setting->all();
         return view('pages.super_admin.settings', $d);
    }

    public function update(Request $req)
    {
        print_r($req->all());

        $this->setting->update(['name'=>$req->name]);

        if($req->hasFile('logo')) {
            $logo = $req->file('logo');
            $f = Qs::getFileMetaData($logo);
            $f['name'] = 'logo.' . $f['ext'];
            $f['path'] = $logo->storeAs(Qs::getPublicUploadPath(), $f['name']);
            $logo_path = asset('storage/' . $f['path']);
            $this->setting->update(['logo'=>$logo_path]);
        }

        return back()->with('flash_success', __('msg.update_ok'));

    }


    public function storefield(Request $req)
    {
        if($req->type == 'dropdown'){
            $this->setting->storefield(['name'=>$req->name,'type'=>$req->type,'options'=>$req->options]);
        }else{
            $this->setting->storefield(['name'=>$req->name,'type'=>$req->type]);
        }

        return Qs::jsonStoreOk();

    }

        public function customfields(){

        $data['fields'] = $this->setting->getFields();

        return view('pages.super_admin.customfields',$data);

    }

    public function editcustomefield( $req){

        $id =  \Request::segment(3);

        $data['fields'] = $this->setting->getSingleField($id)[0];

        return view('pages.super_admin.editcustomfields',$data);

    }


    public function updatefield(Request $req){

        $id =  \Request::segment(3);
        if($req->type == 'dropdown'){
            $this->setting->updatefield($id,['name'=>$req->name,'type'=>$req->type,'options'=>$req->options]);
        }else{
            $this->setting->updatefield($id,['name'=>$req->name,'type'=>$req->type]);
        }

        return Qs::jsonStoreOk();

    }


    public function destroycustomfield(){
        $id =  \Request::segment(3);
        $this->setting->destroyField( $id );
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
