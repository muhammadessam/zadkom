@extends('Admin.Layout.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">كل المستخدمين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="users" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>لاسم</th>
                            <th>الايميل</th>
                            <th>الصورة</th>
                            <th>النوع</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><img style="width: 20px; height: 20px" src="{{asset($user->type)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center"><span class="badge badge-primary">{{$user->type}}</span></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('user.edit', $user)}}"><i class="fa fa-edit"></i></a>
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
            $("#users").DataTable({
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
