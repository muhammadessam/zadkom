<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.products.create');
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'store_id' => 'required',
            'pic' => 'required'
        ], [], [
            'name' => 'اسم المتج',
            'description' => 'الوصف',
            'price' => 'السعر',
            'store_id' => 'المتجر',
            'pic' => 'صورة المنتج'
        ]);

        $product = Product::create($request->all());
        $product->update([
            'pic' => $this->storeFile('Products', 'pic', $request->store_id)
        ]);

        alert()->success('تم ', 'تم اضافة المنتج');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'store_id' => 'required',
        ], [], [
            'name' => 'اسم المتج',
            'description' => 'الوصف',
            'price' => 'السعر',
            'store_id' => 'المتجر',
        ]);
        $product->update($request->all());

        if ($request['pic']) {
            $product->update([
                'pic' => $this->storeFile('Products', 'pic', $request->store_id)
            ]);
        }

        alert()->success('تم ', 'تم التعديل المنتج');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('تم', 'تم الحذف بنجاح');
        return redirect()->route('product.index');
    }


}
