@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل السيارات</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('car.create')}}">اضافة سيارة</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="drivers" class="table table-bordered table-striped">
                        <thead>
                        <tr style="text-align: center">
                            <th>النوع</th>
                            <th>الموديل</th>
                            <th>تاريخ التصنيع</th>
                            <th>هوية السيارة</th>
                            <th>رخصة السيارة</th>
                            <th>السائق</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr style="text-align: center">
                                <td>{{$car->type}}</td>
                                <td>{{$car->model}}</td>
                                <td>{{$car->manufacture_date}}</td>
                                <td><img style="width: 50px;height: 50px" src="{{asset($car->car_id_pic)}}"
                                         alt="هوية السيارة"></td>
                                <td><img style="width: 50px;height: 50px" src="{{asset($car->license_pic)}}"
                                         alt="هوية السيارة"></td>
                                <td><span class="badge badge-primary">{{$car->driver->user->name}}</span></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('car.edit', $car)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('car.destroy', $car)}}"
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
