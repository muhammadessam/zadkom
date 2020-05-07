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
                <h3 class="col-12 text-right">عمل حساب متجر</h3>
                <form class="make-driver text-right" action="{{route('new_store')}}"  method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->id()}}">
                    <input type="hidden" name="lat" value="31.0222">
                    <input type="hidden" name="long" value="31.0222">
                    <div class="form-group">
                        <label for="">الاسم</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">عنوان المتجر</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_24" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            العمر اكبر من 24
                        </label>
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
