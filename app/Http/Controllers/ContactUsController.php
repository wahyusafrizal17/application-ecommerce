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
        return redirect('pages/mail-successfull');
    }

    public function index()
    {
        $data['messages'] = ContactUs::all();

        return view('admin.contact-us.index',$data);
    }

    public function show($id)
    {
        $data['message'] = ContactUs::find($id);

        return view('admin.contact-us.show',$data);
    }

    public function replay($id, Request $request)
    {
        $setting = Setting::find(1);
        $data = ContactUs::find($id);
        $data->reply = $request->reply;
        $data->update();

        Mail::to($data->email)->send(new MessageEmail(['name' => $data->name, 'pesan' => $data->message, 'reply' => $data->reply, 'name_app' => $setting->name, 'email_app' => $setting->email]));
       
        alert()->success('Pesan sudah di balas' , 'Success');
        return redirect('administrator/contact-us');
    }

    public function delete(Request $request)
    {
        ContactUs::where('id', $request->id)->delete();

        return "success";
    }

    public function mailSuccessfull()
    {
        return view('frontend.mail-success');
    }
}
