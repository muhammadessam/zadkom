@extends('Admin.Layout.layout')
@section('content')
    <style>
        #drivers {
            text-align: center;
        }

        .modal {
            z-index: 10000;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Driver::all())}}</h3>

                            <p>كل السائقين</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add "></i>
                        </div>
                        <a href="{{route('driver.index')."?filter=all"}}" class="small-box-footer">الكل<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Driver::where('is_active', 1)->get())}}</h3>

                            <p>سائق مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person "></i>
                        </div>
                        <a href="{{route('driver.index')."?filter=activeDrivers"}}" class="small-box-footer">الفالعين<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Driver::where('is_active', 0)->get())}}</h3>

                            <p>سائق غير مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                        <a href="{{route('driver.index')."?filter=deactiveDrivers"}}" class="small-box-footer">غير فعال
                            <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

            </div>


            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <div class="col-11">
                        <h3 class="card-title"> السائقين</h3>
                    </div>
                    <div class="col-1">
                        <a class="btn btn-primary" href="{{route('driver.create')}}">اضافة سائق</a>
                    </div>
                </div>
                <div class="card-header d-flex justify-content-lg-between">
                    <div class="col-10 d-inline">
                        <h3 class="card-title">العدد <span class="badge badge-primary">{{count($drivers)}}</span>
                        </h3>
                    </div>
                    <div class="col-2">
                        <form class="form-inline" style="width: 100%" action="{{route('driver.index')}}"
                              method="get">
                            <div class="form-group" style="width: 65%">
                                <select style="width: 100%;" class="form-control" name="filter" id="filter">
                                    <option value="all" {{request()->get('filter')=='all' ? 'selected':''}}>
                                        الكل
                                    </option>
                                    <option
                                        value="activeDrivers" {{request()->get('filter')=='activeDrivers' ? 'selected':''}}>
                                        السائقين الفعالين
                                    </option>
                                    <option
                                        value="deactiveDrivers" {{request()->get('filter')=='deactiveDrivers' ? 'selected':''}}>
                                        السائقين الموقوفين
                                    </option>
                                    <option value="free" {{request()->get('filter')=='free' ? 'selected':''}}>
                                        السائقين
                                        الغير
                                        مشغولين
                                    </option>
                                    <option value="busy" {{request()->get('filter')=='busy' ? 'selected':''}}>
                                        المشغولين
                                    </option>

                                </select>
                            </div>
                            <div class="mr-1">
                                <button class="btn btn-primary" type="submit">عرض</button>
                            </div>
                        </form>
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
                                <td><a class="btn btn-outline-dark"
                                       href="{{route('driver.show', $driver)}}">{{$driver->user->name}}</a></td>
                                <td>
                                    @if($driver->is_active)
                                        <label class="btn btn-success btn-sm">مفعل</label>
                                        <a href="{{route('driver_active',$driver->id)}}"
                                           class="btn btn-warning btn-sm">تغيير</a>
                                    @else
                                        <label class="btn btn-danger btn-sm">موقوف</label>
                                        <a href="{{route('driver_active',$driver->id)}}"
                                           class="btn btn-warning btn-sm">تغيير</a>
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
                                    <a href="{{route('driver_orders',$driver->id)}}" type="button"
                                       class="btn btn-primary">
                                        مشاهدة الطلبات
                                    </a>
                                </td>
                                <td>{{$driver->user->phone}}</td>
                                <td><img style="width: 50px; height: 50px"
                                         src="{{asset($driver->user->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center">{{$driver->car != null ? $driver->car->type : 'لم يسجل سيارة'}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('driver.edit', $driver)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block"
                                          action="{{route('driver.destroy', $driver)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction();">
                                            <i
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
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_ سائقين",
                    "entries": "سائق"
                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#drivers_filter').addClass('offset-8');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
