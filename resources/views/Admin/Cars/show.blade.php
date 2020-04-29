@extends('Admin.Layout.layout')
@section('content')
    <div class="col-md-6 offset-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
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
                <a class="btn btn-block btn-primary" href="{{route('driver.edit', $driver)}}">تعديل</a>
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
    <div class="row ">
        <div class="col-10 card offset-1">
            <div class="card-header d-flex justify-content-lg-between">
                <h3 class="card-title">كل العروض المقدمة من السائق</h3>
                <div>
                    <a class="btn btn-primary" href="{{route('product.create')}}">اضافة عرض</a>
                </div>
            </div>
            <div class="card-body card-primary">
                <table id="products" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td>العرض</td>
                        <td>الحالة</td>
                        <td>مقدم الطلب</td>
                        <td>السائق</td>

                        <td>اجراء</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($driver->offers as $offer)
                        <tr>
                            <td>{{$offer->price}}</td>
                            <td><span class="badge {{$offer->accepted ? 'badge-success' : 'badge-danger'}}">{{ $offer->accepted ? 'مقبول' : 'مرفوض' }}</span></td>
                            <td>{{$offer->order->user->name}}</td>
                            <td>{{$offer->driver->user->name}}</td>
                            <td style="text-align: center">
                                <a class="btn btn-primary" href="{{route('offer.edit', $offer)}}"><i
                                        class="fa fa-edit"></i></a>
                                <form style="display: inline-block" action="{{route('offer.destroy', $offer)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return myFunction();"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
