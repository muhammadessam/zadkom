@extends('Admin.Layout.layout')
@section('content')
    <div class="col-md-6 offset-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div>
                <a class="m-3 btn btn-primary" href="{{route('driver.edit', $driver)}}">تعديل</a>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset($driver->user->profile_pic)}}"
                         alt="الصورة الشخصية">
                </div>

                <h3 class="profile-username text-center">{{$driver->user->name}}</h3>

                <p class="text-muted text-center">سائق</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item text-left d-flex justify-content-between">
                        <strong>البريد: </strong>
                        <p>{{$driver->user->email}}</p>
                    </li>
                    <li class="list-group-item text-left d-flex justify-content-between">
                        <strong>الهاتف: </strong>
                        <p>{{$driver->user->phone}}</p>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">المستندات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong>البطاقة الشخصية</strong>
                <img style="width: 100%;height: 300px;" src="{{asset($driver->id_pic)}}" alt="صورة البطاقة الشخصية">
                <hr>

                <strong>رخصة القيادة</strong>
                <img style="width: 100%;height: 300px;" src="{{asset($driver->license_pic)}}"
                     alt="صورة البطاقة الشخصية">
                <hr>

                <strong>التامين الطبي</strong>
                <img style="width: 100%;height: 300px;" src="{{asset($driver->insurance_pic)}}"
                     alt="صورة البطاقة الشخصية">
                <hr>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
