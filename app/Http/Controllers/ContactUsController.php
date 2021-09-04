<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function hubungiKami()
    {
        $data['setting']        = Setting::find(1);
        return view('frontend.pages.hubungi-kami',$data);
    }

    public function contactUs(Request $request)
    {
        ContactUs::create($request->all());

        alert()->success('Terimakasih telah menghubungi kami' , 'Success');
        return redirect('pages/hubungi-kami');
    }

    public function index()
    {
        $data['messages'] = ContactUs::all();

        return view('admin.message.index',$data);
    }

    public function show($id)
    {
        $data['message'] = ContactUs::find($id);

        return view('admin.message.show',$data);
    }

    public function replay($id, Request $request)
    {
        $setting = Setting::find(1);
        $data = ContactUs::find($id);
        $data->reply = $request->reply;
        $data->update();

        Mail::to($data->email)->send(new MessageEmail(['name' => $data->name, 'pesan' => $data->message, 'reply' => $data->reply, 'name_app' => $setting->name, 'email_app' => $setting->email]));
       
        alert()->success('Pesan sudah di balas' , 'Success');
        return redirect('administrator/message');
    }
}
