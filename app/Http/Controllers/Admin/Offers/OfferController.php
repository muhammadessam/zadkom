<?php

namespace App\Http\Controllers\Admin\Offers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('Admin.Offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Offers.create');
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
            'price' => 'required',
            'order_id' => 'required',
            'driver_id' => 'required',
        ], [], [
            'price' => 'السعر',
            'order_id' => 'مقدط الطلي',
            'driver_id' => 'مقدم العرص'
        ]);
        $request['accepted'] = $request['accepted'] ? true : false;
        $offer = Offer::create($request->all());
        alert()->success('تم ', 'تمت بنجاح');
        if (url()->previous() == route('addOrderOffer', $request['order_id'])) {
            return \redirect()->route('order.show', $request['order_id']);
        }
        return redirect()->route('offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('Admin.Offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'price' => 'required',
            'order_id' => 'required',
            'driver_id' => 'required',
        ], [], [
            'price' => 'السعر',
            'order_id' => 'مقدط الطلي',
            'driver_id' => 'مقدم العرص'
        ]);
        $request['accepted'] = $request['accepted'] ? true : false;
        $offer->update($request->all());
        alert()->success('تم ', 'تم التعديل العرض بنجاح');
        return redirect()->route('offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        alert()->success('تم', 'تم الحذف بنجاح');
        return redirect()->route('offer.index');
    }
}
