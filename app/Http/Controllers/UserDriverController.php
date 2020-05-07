<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Storage;
class UserDriverController extends Controller
{
    public function make()
    {
        $myuser = auth()->user();
        return view('site.user.make_driver',compact('myuser'));
    }
    public function new(Request $r)
    {
     //   return $r;
        $d = Driver::create([
            'user_id'=>$r['user_id'], 
            'id_pic' => Storage::disk('public')->putFile('Profiles/'.$r['user_id'], $r->file('id_pic')),
            'license_pic' => Storage::disk('public')->putFile('Profiles/'.$r['user_id'], $r->file('license_pic')),
            'insurance_pic' => Storage::disk('public')->putFile('Profiles/'.$r['user_id'], $r->file('insurance_pic')),
        ]);
        return redirect()->route('profile.edit',auth()->id());
    }
}
