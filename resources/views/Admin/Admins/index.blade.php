@extends('Admin.Layout.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">كل المشرفين</h3>
                    <a class="btn btn-primary" href="{{route('admins.create')}}">اضافة</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table style="text-align: center" id="users" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>الصورة</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td><a class="btn btn-outline-dark"
                                       href="{{route('admins.show', $admin)}}">{{$admin->name}}</a></td>
                                <td>{{$admin->email}}</td>
                                <td><img style="width: 50px; height: 50px" src="{{asset($admin->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('admins.edit', $admin)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('admins.destroy', $admin)}}"
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

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>

@endsection
