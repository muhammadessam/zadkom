<?php

namespace App\Http\Controllers\Admin\Ratings;
use App\User;
use App\Models\DriverRatsCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverRatsCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = DriverRatsCustomer::all();
        return view('Admin.Ratings.driverRatsCustomers.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Ratings.driverRatsCustomers.create');
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

        DriverRatsCustomer::create($request->all());
        alert()->success('تم بنجاح');
        if (url()->previous() == route('addCustomerRating', $request['customer_id']))
            return redirect()->route('customer.show', $request['customer_id']);
        return redirect()->route('customerRating.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DriverRatsCustomer $driverRatsCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(DriverRatsCustomer $driverRatsCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DriverRatsCustomer $driverRatsCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverRatsCustomer $driverRatsCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DriverRatsCustomer $driverRatsCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverRatsCustomer $driverRatsCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DriverRatsCustomer $driverRatsCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverRatsCustomer $customerRating)
    {
        $customerRating->delete();
        alert()->success('تم بنجاح');
        return redirect()->back();

    }

    public function addCustomerRating(User $user)
    {
        return view('Admin.Ratings.driverRatsCustomers.addRating', compact('user'));

    }

}
