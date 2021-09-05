<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $data['utama'] = Slider::where('status', 1)->first();
        $data['sliders'] = Slider::where('status', 0)->get();
        return view('admin.slider.index',$data);
    }

    /**
    public function addSlider(Request $request)
    {
        if($request->status == 1){
            $model = Slider::where('status', 1)->first();
            if(!empty($model)){
                $model->status = 0;
                $model->save();
            }
        }


        $input = $request->all();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();    
            $destinationPath = 'assets/img/slider';
            $file->move($destinationPath,$file->getClientOriginalName());

            $input['image'] = $fileName;
        }

        Slider::create($input);

        alert()->success('Data berhasil ditambahkan' , 'Success');
        return redirect('administrator/slider');
    }

    public function deleteSlider(Request $request)
    {
        $data = Slider::find($request->id);
        if($data){
            if(!empty($data->image)){
                unlink('assets/img/slider/'.$data->image);
            }
            $data->delete();
        }

        return "success";
    }
}
