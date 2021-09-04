<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengaturan'] = Setting::find(1)->first();
        $data['provinces']      = \DB::table('tb_ro_provinces')->pluck('province_name','province_id');
        return view('admin.setting.index',$data);
    }


    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        $input = $request->all();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();    
            $destinationPath = 'assets/img/setting';
            $file->move($destinationPath,$file->getClientOriginalName());

            $input['logo']         = $fileName;
        }
        
        $setting->update($input);

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('administrator/setting');
    }


}
