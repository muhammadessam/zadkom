<?php

namespace App\Http\Controllers\Admin\BankAccounts;

use App\Models\BankAccount;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.BankAccounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\BankAccount $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\BankAccount $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\BankAccount $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\BankAccount $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }

    public function addDriverBankAccountGet(Driver $driver)
    {
        return view('Admin.BankAccounts.addDriverBankAccount', compact('driver'));
    }

    public function editDriverBankAccountGet(Driver $driver)
    {
        return view('Admin.BankAccounts.editDriverBankAccount', compact('driver'));
    }

    public function addDriverBankAccountPost(Request $request, Driver $driver)
    {
        $request->validate([
            'number' => 'required|numeric'
        ]);
        $driver->bankAccount()->create([
            'account_number' => $request['number']
        ]);
        alert()->success('تم اضافة رقم الحساب');
        return redirect()->route('driver.show', $driver);
    }

    public function editDriverBankAccountPost(Request $request, BankAccount $bankAccount)
    {
        $request->validate([
            'number' => 'required|numeric'
        ]);
        $bankAccount->update([
            'account_number' => $request['number']
        ]);
        alert()->success('تم تعديل رقم الحساب');
        return redirect()->route('driver.show', $bankAccount->driver);
    }
}
