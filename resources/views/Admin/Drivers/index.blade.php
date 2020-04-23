@extends('Admin.Layout.layout')
@section('content')
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
                    <table id="drivers" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>لاسم</th>
                            <th>الايميل</th>
                            <th>الصورة</th>
                            <th>نوع السيارة</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)
                            <tr>
                                <td>{{$driver->user->name}}</td>
                                <td>{{$driver->phone}}</td>
                                <td><img style="width: 20px; height: 20px" src="{{asset($driver->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center">{{$driver->user->type}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('driver.edit', $driver)}}"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>لاسم</th>
                            <th>الايميل</th>
                            <th>الصورة</th>
                            <th>النوع</th>
                            <th>اجراء</th>
                        </tr>
                        </tfoot>
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
    </script>
@endsection
