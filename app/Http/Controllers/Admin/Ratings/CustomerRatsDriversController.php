<?php

namespace App\Http\Controllers\Admin\Ratings;

use App\Models\Driver;
use App\Models\CustomerRatsDriver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRatsDriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = CustomerRatsDriver::all();
        return view('Admin.Ratings.customerRatsDrivers.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Ratings.customerRatsDrivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric|min:1|max:5',
            'customer_id' => 'required',
            'driver_id' => 'required'
        ], [], [
            'value' => 'القيمة',
            'customer_id' => 'العميل',
            'driver_id' => 'السائق',
        ]);

        CustomerRatsDriver::create($request->all());
        alert()->success('تم بنجاح');
        if (url()->previous() == route('addDriverRating', $request['driver_id']))
            return redirect()->route('driver.show', $request['driver_id']);
        return redirect()->route('driverRating.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Rating $rating
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerRatsDriver $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Rating $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerRatsDriver $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Rating $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerRatsDriver $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Rating $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerRatsDriver $driverRating)
    {
        $driverRating->delete();
        alert()->success('تم بنجاح');
        return redirect()->route('driverRating.index');
    }

    public function addDriverRating(Driver $driver)
    {
        return view('Admin.Ratings.customerRatsDrivers.addRating', compact('driver'));
    }
}
