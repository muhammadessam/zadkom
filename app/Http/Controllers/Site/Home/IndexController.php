<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Store;
class IndexController extends Controller
{
    public function Home()
    {
        $stores = Store::all()->sortByDesc('id');
        $is_null = $this->is_null_field(auth()->user());
        return view('site.home',["stores"=>$stores,'is_null'=>$is_null]);
    }
    public function is_null_field(User $user){
        if($user->driver != null) {
            if ($user->driver->id_pic == null) {
                return false;
            }
            if ($user->driver->insurance_pic == null) {
                return false;
            }
            if ($user->driver->licence_pic == null) {
                return false;
            }
        }
        else{
            if ($user->email == null){
                return false;
            }
            if ($user->phone == null){
                return false;
            }
            if ($user->profile_pic == null){
                return false;
            }
        }
        return true;
    }
}
