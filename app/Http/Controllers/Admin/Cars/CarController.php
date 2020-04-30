<?php

namespace App\Http\Controllers\Admin\Cars;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('Admin.Cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Cars.create');
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
            'type' => 'required',
            'model' => 'required',
            'manufacture_date' => 'required|numeric',
            'car_id_pic' => 'required',
            'license_pic' => 'required',
            'driver_id' => 'required|numeric'
        ], [], [
            'type' => 'النوع',
            'model' => 'الموديل',
            'manufacture_date' => 'تاريخ التصنيع',
            'car_id_pic' => 'صورة هوية السيارة',
            'license_pic' => 'صورة رخصة السيارة',
            'driver_id' => 'السائق'
        ]);
        $car = Car::create([
            'type' => $request['type'],
            'model' => $request['model'],
            'manufacture_date' => $request['manufacture_date'],
            'driver_id' => $request['driver_id'],
            'car_id_pic' => $this->storeFile('Cars', 'car_id_pic', $request['driver_id']),
            'license_pic' => $this->storeFile('Cars', 'license_pic', $request['driver_id'])
        ]);

        alert()->success('تم', 'تم الاضافة بنجاح');
        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('Admin.Cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('Admin.Cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'type' => 'required',
            'model' => 'required',
            'manufacture_date' => 'required|numeric',
            'driver_id' => 'required|numeric'
        ], [], [
            'type' => 'النوع',
            'model' => 'الموديل',
            'manufacture_date' => 'تاريخ التصنيع',
            'driver_id' => 'السائق'
        ]);
        $car->update([
            'type' => $request['type'],
            'model' => $request['model'],
            'manufacture_date' => $request['manufacture_date'],
            'driver_id' => $request['driver_id'],
        ]);
        if ($request['car_id_pic'] != null) {
            $car->update([
                'car_id_pic' => $this->storeFile('Cars', 'car_id_pic', $request['driver_id']),
            ]);
        }
        if ($request['license_pic'] != null) {
            $car->update([
                'license_pic' => $this->storeFile('Cars', 'license_pic', $request['driver_id'])
            ]);
        }
        alert()->success('تم', 'تم التعديل بنجاح');
        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        alert()->success('تم', 'تم الحذف بنجاح');
        return back();
    }
}
