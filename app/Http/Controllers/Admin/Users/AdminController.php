<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('Admin.Admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admins.create');

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

        $user = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);

        if ($data['profile_pic'] != null && $data['profile_pic'] != '') {
            $user->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $user->id)]);
        }

        alert()->success('تم', 'تم اضافة مشرف جديد');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('Admin.Admins.edit', compact('admin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',

        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
        ]);

        $admin->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $request->password != null && $request->password != '' ? Hash::make($request->password) : $admin->password,
            'phone' => $request->phone,
        ]);

        if ($request['profile_pic'] != null && $request['profile_pic'] != '') {
            $admin->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $admin->id)]);
        }

        alert()->success('تم', 'تم التعديل');
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        alert()->success('تم ', 'تم حذف المستخدم');
        return redirect()->route('admins.index');
    }
}
