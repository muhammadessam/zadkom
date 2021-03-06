@extends('Admin.Layout.layout')
@section('content')
    <div class="text-center mb-2">
        <a href="{{route('addDriverRating', $driver)}}" class="btn btn-primary">تقيم</a>
    </div>
    <div class="text-center mb-2">
        <h3>{{$rating}} <span class="fa fa-star text-warning"></span></h3>
    </div>

    <div class="row d-flex ">
        <!-- Profile Image -->
        <div style="width: 49%;">
            <div style="height:fit-content " class="m-1 card card-primary card-outline">

                <div class="card-body box-profile">
                    <div class="text-center">
                        <img style="width: 100px;height: 100px;" class="profile-user-img img-fluid img-circle"
                             src="{{asset($driver->user->profile_pic)}}"
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
                        <li class="list-group-item text-left d-flex justify-content-between">
                            <strong>اجمالي عدد الطلبات للسائق : </strong>
                            <p class="badge  badge-success"><strong>{{$driver->orders->count()}}</strong></p>
                        </li>
                        <li class="list-group-item text-left d-flex justify-content-between">
                            <strong>اجمالي الرصيد : </strong>
                            <p class="badge  badge-success">
                                <strong>{{$driver->balance ? $driver->balance : '-'}}</strong></p>
                        </li>
                    </ul>
                    <a class="btn btn-block btn-primary" href="{{route('driver.edit', $driver)}}">تعديل</a>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="m-1 card card-primary">
                <div class="card-header">
                    <h3 class="card-title">معلومات الحساب البنكي</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <li class="list-group-item text-left d-flex justify-content-between align-items-center">
                        <strong>رقم الحساب: </strong>
                        @if($driver->bankAccount)
                            <p class="badge  badge-success">
                                <strong>{{$driver->bankAccount->account_number}}</strong></p>
                            <div class="d-flex">
                                <a href="{{route('edit.bank.driver.get', $driver)}}" class="btn btn-success ml-1"><i
                                        class="fa fa-edit"></i></a>
                                <form action="{{route('BankAccount.destroy', $driver->bankAccount->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        @else
                            <p class="">
                                <a class="btn btn-primary" href="{{route('add.bank.driver.get', $driver)}}">اضافة رقم
                                    حساب</a>
                            </p>
                        @endif
                    </li>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <!-- /.card -->

        <!-- About Me Box -->
        <div style="width: 49%" class="m-1 card card-primary">
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

            </div>
            <div class="card-body card-primary">
                <table id="offers" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td>العرض</td>
                        <td>الحالة</td>
                        <td>مقدم الطلب</td>
                        <td>اجراء</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($driver->offers as $offer)
                        <tr>
                            <td>{{$offer->price}}</td>
                            <td><span
                                    class="badge {{$offer->accepted ? 'badge-success' : 'badge-danger'}}">{{ $offer->accepted ? 'مقبول' : 'مرفوض' }}</span>
                            </td>
                            <td>{{$offer->order->user->name}}</td>
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

    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    معلومات السيارة الخاصة بالسائق
                </div>
                @if(!is_null($driver->car))
                    <div class="card-body">
                        <table id="drivers" class="table table-bordered table-striped">
                            <thead>
                            <tr style="text-align: center">
                                <th>الرئيسي</th>
                                <th>الفرعي</th>
                                <th>تاريخ التصنيع</th>
                                <th>هوية السيارة</th>
                                <th>رخصة السيارة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="text-align: center">
                                <td>{{$driver->car->carMake->title}}</td>
                                <td>{{$driver->car->CarModel->title}}</td>
                                <td>{{$driver->car->manufacture_date}}</td>
                                <td><img style="width: 50px;height: 50px" src="{{asset($driver->car->car_id_pic)}}"
                                         alt="هوية السيارة"></td>
                                <td><img style="width: 50px;height: 50px" src="{{asset($driver->car->license_pic)}}"
                                         alt="هوية السيارة"></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('car.edit', $driver->car)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('car.destroy', $driver->car)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction();"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            </tbody>

                        </table>
                    </div>
                @else
                    <div class="card-body text-center">
                        لا توجد سيارة
                        <a class="btn btn-primary" href="{{route('addDriverCarForm', $driver)}}">اضافة سيارة</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        $(function () {
            $("#offers").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous": "السابق"
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_ سائقين",
                    "entries": "سائق"
                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#offers_filter').addClass('text-left');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
