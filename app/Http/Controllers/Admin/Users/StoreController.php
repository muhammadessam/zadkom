<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use App\User;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('filter')) {
            if ($request->get('filter') == 'activeStores') {
                $stores = Store::where('is_active', 1)->get();
            } else if ($request->get('filter') == 'deactiveStores') {
                $stores = Store::where('is_active', 0)->get();
            } else if ($request->get('filter') == 'is24Active') {
                $stores = Store::where('is_24', 1)->get();
            } else if ($request->get('filter') == 'isNot24Active') {
                $stores = Store::where('is_24', 0)->get();
            } else {
                $stores = Store::all();
            }
        } else {
            $stores = Store::all();
        }
        return view('Admin.Stores.index', compact('stores'));
    }

    public function edit(Store $store)
    {
        return view('Admin.Stores.edit', compact('store'));
    }

    public function create()
    {
        return view('Admin.Stores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_pic' => '',
            'phone' => 'required',
            'store_name' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'is_24' => 'required',
            'is_active' => 'required',
        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
            'profile_pic' => 'الصورة الشخصية',
            'phone' => 'الجوال',
            'store_name' => 'اسم المتجر',
            'lat' => 'العرض',
            'long' => 'الطول',
            'is_24' => 'فعال 24 ساعة',
            'is_active' => 'فعال',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'type' => 'store',
        ]);
        if ($data['profile_pic'] != null && $data['profile_pic'] != '') {
            $user->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $user->id)]);
        }
        $user->store()->create([
            'name' => $data['store_name'],
            'lat' => $data['lat'],
            'long' => $data['long'],
            'is_24' => $data['is_24'] == 'on' ? true : false,
            'is_active' => $data['is_active'] == 'on' ? true : false,
        ]);

        alert()->success('تم ', 'تك الاضافة بنجاح');
        return redirect()->route('store.index');
    }

    public function show(Store $store)
    {
        return view('Admin.Stores.show', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_pic' => '',
            'phone' => '',
            'store_name' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ], [], [
            'name' => 'الاسم ',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
            'profile_pic' => 'الصورة الشخصية',
            'phone' => 'الجوال',
            'store_name' => 'اسم المتجر',
            'lat' => 'العرض',
            'long' => 'الطول',
            'is_24' => 'فعال 24 ساعة',
            'is_active' => 'فعال',
        ]);
        $store->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
        if ($request['profile_pic'] != null && $request['profile_pic'] != '') {
            $store->user()->update(['profile_pic' => $this->storeFile('Profiles', 'profile_pic', $store->user->id)]);
        }
        $store->update([
            'name' => $data['store_name'],
            'lat' => $data['lat'],
            'long' => $data['long'],
            'is_24' => $request['is_24'] == 'on' ? true : false,
            'is_active' => $request['is_active'] == 'on' ? true : false,
        ]);

        alert()->success('تم ', 'تك التعديل بنجاح');
        return redirect()->route('store.index');

    }

    public function destroy(Store $store)
    {
        $store->user()->delete();
        $store->delete();
        alert()->success('تم', 'تم الحذف بنجاح');
        return back();
    }
}
