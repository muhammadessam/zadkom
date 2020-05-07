@extends('layouts.myapp')
@section('content')
<style>
.make-driver button{
    background-color: orange;
    color:white;
}
</style>
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
            <div class="container">
            <h3 class="col-12 text-right">عمل حساب سائق</h3>
                <form class="make-driver" action="{{route('new_driver')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <h4 class="col-12 text-right">صورة البطاقة شخصية</h4>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="id_pic" id="id_pic">
                    <label class="custom-file-label"  for="id_pic">صورة البطاقة شخصية</label>
                </div>
                <h4 class="col-12 text-right">صورة رخصة القيادة</h4>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="license_pic" id="license_pic">
                    <label class="custom-file-label"  for="license_pic">صورة رخصة القيادة</label>
                </div>
                <h4 class="col-12 text-right">صورة التأمين</h4>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="insurance_pic" id="insurance_pic">
                    <label class="custom-file-label"  for="insurance_pic">صورة التأمين</label>
                </div>
                <button class="btn btn-block mt-2" type="submit">حفظ</button>
                </form>
            </div>
        </div>
        <div class="col-md-3 profile-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.edit',$myuser->id)}}">تعديل حسابك</a>
                </li>
                @if($myuser->driver == null && $myuser->store == null)
                <li class="nav-item">
                    <a class="nav-link" href="#"> عمل حساب سائق</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"> عمل حساب متجر</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">طلباتي</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
