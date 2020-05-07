<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function createCountry()
    {
        return view('Admin.Address.country');
    }
    public function storeCountry(Request $r)
    {
        
    }
    public function createCity()
    {
        return view('Admin.Address.city');
    }
    public function storeCity(Request $r)
    {
        
    }
    public function createState()
    {
        return view('Admin.Address.state');
    }
    public function storeState(Request $r)
    {
        
    }
}
