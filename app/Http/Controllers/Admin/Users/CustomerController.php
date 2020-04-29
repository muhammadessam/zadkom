<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('type', 'normal')->get();
        return view('Admin.Customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_pic' => '',
            'phone' => 'required|numeric',

        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
            'profile_pic' => 'الصورة الشخصية',
            'phone' => 'الجوال',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'type' => 'normal',
        ]);

        if ($data['profile_pic'] != null && $data['profile_pic'] != '') {
            $user->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $user->id)]);
        }

        alert()->success('تم', 'تم اضافة عميل جديد');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Admin $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $user)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',

        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $request->password != null && $request->password != '' ? Hash::make($request->password) : $user->password,
            'phone' => $request->phone,
            'type' => 'normal',
        ]);

        if ($request['profile_pic'] != null && $request['profile_pic'] != '') {
            $user->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $user->id)]);
        }

        alert()->success('تم', 'تم اضافة عميل جديد');
        return redirect()->route('customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.Customers.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Admin $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        $user->delete();
        alert()->success('تم ', 'تم الحذف بنجاح');
        return redirect()->back();
    }
}
