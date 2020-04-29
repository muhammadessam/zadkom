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
        <div class="col-md-9 profile-edit">
            <h4>تعديل البيانات الشخصية</h4>
            <form action="{{route('profile.update',$myuser->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="form-group">
                    <label for="exampleFormControlInput1">البريد الالكتروني</label>
                    <input type="email" value="{{$myuser->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">رقم الهاتف</label>
                    <input type="tel" value="{{$myuser->phone}}" name="phone" class="form-control" id="exampleFormControlInput2" placeholder="011000000">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">الاسم</label>
                    <input type="text" value="{{$myuser->name}}" name="name" class="form-control" id="exampleFormControlInput3" placeholder="">
                </div>
                <div class="form-group">
                    <label for="customFile">الصورة الشخصية</label>
                    <div class="custom-file">
                        <input type="file"  name="profile_pic" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">اختار صورة</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block"> حــفـظ </button>
            </form>
        </div>
        <div class="col-md-3 profile-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.index')}}">الصفحة الشخصية</a>
                </li>
                @if($myuser->store == null && $myuser->driver == null)
                <li class="nav-item">
                    <a class="nav-link" href="#">تقديم طلب سائق</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تقديم طلب متجر</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">طلباتي</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
