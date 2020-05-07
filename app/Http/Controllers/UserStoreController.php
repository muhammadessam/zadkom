<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
class UserStoreController extends Controller
{
    public function make()
    {
        $myuser = auth()->user();
        return view('site.user.make_store',compact('myuser'));
    }
    public function new(Request $r)
    {
     //   return $r;
        $d = Store::create($r->except('_token'));
        return redirect()->route('profile.edit',auth()->id());
    }
}
