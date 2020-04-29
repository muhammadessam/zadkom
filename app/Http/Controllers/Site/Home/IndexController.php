<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
class IndexController extends Controller
{
    public function Home()
    {
        $stores = Store::all()->sortByDesc('id');
        return view('site.home',compact('stores'));
    }
}
