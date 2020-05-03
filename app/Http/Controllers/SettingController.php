<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingController extends Controller
{
    public function edit()
    {
        if (count( Setting::all() ) == 0) {
            $set = new Setting();
            $set->save();
        }
        $set = Setting::first();
        return view('Admin.Setting.index',['set'=>$set]);
        
    }
    public function save(Request $r)
    {
        $set = Setting::first();
        $set->update($r->except('_token'));
        return view('Admin.Setting.index',['set'=>$set]);
    }
}
