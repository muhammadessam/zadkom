<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('filter')) {
            if ($request->get('filter') == 'pending') {
                $orders = Order::where('status', 'pending')->get();
            } else if ($request->get('filter') == 'accepted') {
                $orders = Order::where('status', 'accepted')->get();
            } else if ($request->get('filter') == 'completed') {
                $orders = Order::where('status', 'completed')->get();
            } else {
                $orders = Order::all();
            }
        } else {
            $orders = Order::all();
        }
        return view('Admin.Orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Orders.create');
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
            'user_id' => 'required|exists:users,id',
            'lat' => 'required',
            'long' => 'required',
            'status' => 'required',
        ], [], [
            'user_id' => 'العميل',
            'lat' => 'العرض',
            'long' => 'الطول'
        ]);
        $order = Order::create($request->all());
        alert()->success('تم الاضافة بنجاح');


        return \redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        return view('Admin.Orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Order $order
     * @return View
     */
    public function edit(Request $request, Order $order)
    {
        return view('Admin.Orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Route
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lat' => 'required',
            'long' => 'required',
            'status' => 'required',
        ], [], [
            'user_id' => 'العميل',
            'lat' => 'العرض',
            'long' => 'الطول',
            'status' => 'الحالة',
        ]);
        if ($request['status'] == 'pending') {
            $request['driver_id'] = null;
        }
        $order->update($request->all());
        alert()->success('تم بنجاح');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        alert()->success('تم الحذف بنجاح');
        return back();
    }

    public function addOffer(Order $order)
    {
        return view('Admin.Offers.create', compact('order'));
    }
}
