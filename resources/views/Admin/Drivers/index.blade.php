@extends('Admin.Layout.layout')
@section('content')
    <style>
        #drivers{
            text-align: center;
        }
        .modal{
            z-index:10000;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل السائقين</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('driver.create')}}">اضافة سائق</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table style="text-align: center" id="drivers" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>لاسم</th>
                            <th>حالة التفعيل</th>
                            <th>حالة التوصيل</th>
                            <th>الطلبات</th>
                            <th>الجوال</th>
                            <th>الصورة</th>
                            <th>نوع السيارة</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)
                            <tr>
                                <td><a class="btn btn-outline-dark" href="{{route('driver.show', $driver)}}">{{$driver->user->name}}</a></td>
                                <td>
                                    @if($driver->is_active)
                                        <label class="btn btn-success btn-sm">مفعل</label>
                                        <a href="{{route('driver_active',$driver->id)}}" class="btn btn-warning btn-sm">تغيير</a>
                                    @else
                                        <label class="btn btn-danger btn-sm">موقوف</label>
                                        <a href="{{route('driver_active',$driver->id)}}" class="btn btn-warning btn-sm">تغيير</a>
                                    @endif
                                </td>
                                <td>
                                    @if($driver->status == "free")
                                        <label class="btn btn-success btn-sm">متاح</label>
                                    @else
                                        <label class="btn btn-danger btn-sm">مشغول</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('driver_orders',$driver->id)}}" type="button" class="btn btn-primary">
                                        مشاهدة الطلبات
                                    </a>
                                </td>
                                <td>{{$driver->user->phone}}</td>
                                <td><img style="width: 50px; height: 50px" src="{{asset($driver->user->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center">{{$driver->car != null ? $driver->car->type : 'لم يسجل سيارة'}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('driver.edit', $driver)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('driver.destroy', $driver)}}"
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection


@section('javascript')
    <script>
        $(function () {
            $("#drivers").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous": "السابق"
                    }
                },
                "info": false,
            });
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
