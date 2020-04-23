<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('Admin.Drivers.index', compact('drivers'));
    }

    public function create(Request $request)
    {
       return view('Admin.Drivers.create');
    }
}
