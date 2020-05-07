@extends('layouts.myapp')
@section('content')
    <div class="row profile-header" style="background-image: url('{{asset('images/bg1.png')}}')">
        @if($myuser->profile_pic != null)
            <img src="{{asset('users-imgs/'.$myuser->profile_pic)}}">
        @else
            <img src="{{asset('users-imgs/unknown.jpg')}}">
        @endif
        <h3>{{$myuser->name}}</h3>
    </div>
    <div class="row profile-body">
        <div class="col-md-9 profile-info">
            <div class="basic-info row">
                <div class="col-md-6 row">
                    <h4 class="col-md-9">
                        {{$myuser->email}}
                    </h4>
                    <label class="col-md-3"> : البريد الالكتروني </label>
                </div>
                <div class="col-md-6 row">
                    <h4 class="col-md-9">
                        {{$myuser->phone}}
                    </h4>
                    <label class="col-md-3"> : رقم الهاتف </label>
                </div>
            </div>
            <div class="row store-info">
                @if($myuser->store == null )
                    <h3>انت لم تسجل كا متجر بعد .</h3>
                @else
                    <h4> {{$myuser->store->name}} <small>: متجر </small></h4>
                    <h5>أصناف المتجر</h5>
                    <table class="table orders-table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الوصف</th>
                            <th scope="col">الادارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myuser->store->products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <button class="btn-info btn">تعدبل</button>
                                <button  class="btn btn-danger">حذف</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="row driver-info">
                @if($myuser->driver == null && $myuser->store == null)
                    <h3>انت لم تسجل كاسائق بعد .</h3>
                @else

                @endif
            </div>
        </div>
        <div class="col-md-3 profile-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.edit',$myuser->id)}}">تعديل حسابك</a>
                </li>
                @if($myuser->driver == null && $myuser->store == null)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('make_driver')}}"> عمل حساب سائق</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('make_store')}}"> عمل حساب متجر</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">طلباتي</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
