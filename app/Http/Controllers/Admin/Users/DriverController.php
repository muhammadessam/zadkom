<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Driver;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    public function show(Driver $driver)
    {
        return view('Admin.Drivers.show', compact('driver'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_pic' => '',
            'phone' => 'required|numeric',
            'id_pic' => 'required',
            'license_pic' => 'required',
            'insurance_pic' => 'required',
        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
            'profile_pic' => 'الصورة الشخصية',
            'phone' => 'الجوال',
            'id_pic' => 'صورة البطاقة',
            'license_pic' => 'صورة رخصة القيادة',
            'insurance_pic' => 'صورة التامين الطبي'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'type' => 'driver',
        ]);

        if ($data['profile_pic'] != null && $data['profile_pic'] != '') {
            $user->update(['profile_pic' => $this->storeFile('profile_pic', $user->id)]);
        }
        $user->driver()->create([
            'id_pic' => $this->storeFile('id_pic', $user->id),
            'license_pic' => $this->storeFile('license_pic', $user->id),
            'insurance_pic' => $this->storeFile('insurance_pic', $user->id),
        ]);

        alert()->success('نم', 'تم اضافة سائق جديد');
        return redirect()->route('driver.index');
    }

    public function edit(Driver $driver)
    {
        return view('Admin.Drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => '',
        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
            'phone' => 'الجوال',
        ]);

        $driver->user()->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

        if ($request['profile_pic'] != null && $request['profile_pic'] != '') {
            $driver->user()->update(['profile_pic' => $this->storeFile('profile_pic', $driver->user->id)]);
        }
        if ($request['id_pic'])
            $driver->update([
                'id_pic' => $this->storeFile('id_pic', $driver->user->id),
            ]);
        if ($request['license_pic'])
            $driver->update([
                'license_pic' => $this->storeFile('license_pic', $driver->user->id),
            ]);
        if ($request['insurance_pic'])
            $driver->update([
                'insurance_pic' => $this->storeFile('insurance_pic', $driver->user->id),
            ]);
        alert()->success('تم ', 'تم التعديل بنجاح');
        return redirect()->route('driver.index');
    }

    public function destroy(Driver $driver)
    {
        $driver->user()->delete();
        $driver->delete();
        return redirect()->route('driver.index');
    }
}
