<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $r)
    {
        $con = new Contact();
        $con->name      = $r->name;
        $con->phone     = $r->phone;
        $con->email     = $r->email;
        $con->content   = $r['content'];
        $con->save();
        alert()->success('تم الارسال بنجاح شكرا لك');
        return redirect()->back();
    }
    public function send(Request $request){
        $to_name = Contact::find($request->contact_id)->name;
        $to_email = Contact::find($request->contact_id)->email;
        $data = array('name'=>'laravel', 'body' => $request->mail);
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('answer');
        $message->from('ahmedtofahadev5@gmail.com',env('APP_NAME'));
        });
        alert()->success('تم الارسال بنجاح شكرا لك');
        return redirect()->back();
    }
}
