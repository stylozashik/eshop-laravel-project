<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function send_message(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $date_time = now();
        $data['contact_date'] = date_format($date_time,"d/m/Y");
        $data['contact_time'] = date_format($date_time,"H:i:s");
        
        DB::table('messages')
        ->insert($data);

        return redirect('contact/success');
    }

    public function success(){
        return view('frontend.pages.success');
    }

    public function messages_view(){
        $obj = new SuperAdminController();
        $obj->AdminCheckAuth();
        $contact = DB::table('messages')->get();

        return view('backend.contact.index',compact('contact'));
    }
}
