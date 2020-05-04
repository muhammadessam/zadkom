<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function store(Request $r)
    {
        $con = new Contact();
        $con->name      = $r->name;
        $con->phone     = $r->phone;
        $con->email     = $r->email;
        $con->content   = $r->content;
        $con->save();
        alert()->success('تم الارسال بنجاح شكرا لك');   
        return redirect()->back();
    }
}
