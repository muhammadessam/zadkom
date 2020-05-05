@extends('Admin.Layout.layout')
@section('content')
    <div class="text-center mb-2">
        <a href="{{route('addCustomerRating', $user)}}" class="btn btn-primary">تقيم</a>
    </div>
    <div class="text-center mb-2">
        <h3>{{$rating}} <span class="fa fa-star text-warning"></span></h3>
    </div>
    <div class="col-md-6 offset-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset($user->profile_pic)}}"
                         alt="الصورة الشخصية">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">سائق</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item text-left d-flex justify-content-between">
                        <strong>البريد: </strong>
                        <p>{{$user->email}}</p>
                    </li>
                    <li class="list-group-item text-left d-flex justify-content-between">
                        <strong>الهاتف: </strong>
                        <p>{{$user->phone}}</p>
                    </li>
                </ul>
                <a class="btn btn-block btn-primary" href="{{route('customer.edit', $user)}}">تعديل</a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <div class="row ">
        <div class="col-10 card offset-1">
            <div class="card-header d-flex justify-content-lg-between">
                <h3 class="card-title">كل الطلبات</h3>
                <div>
                    <a class="btn btn-primary" href="{{route('order.create')}}">اضافة طلب</a>
                </div>
            </div>
            <div class="card-body card-primary">
                <table id="orders" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td>الطلب</td>
                        <td>مقدم الطلب</td>
                        <td>الحالة</td>
                        <td>المتجر</td>
                        <td>السائق</td>
                        <td>اجراء</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->orders as $order)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center">
                                <a class="btn btn-primary" href="{{route('order.edit', $order)}}"><i
                                        class="fa fa-edit"></i></a>
                                <form style="display: inline-block"
                                      action="{{route('order.destroy', $order)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return myFunction();"><i
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

@section('javascript')
    <script>
        $(function () {
            $("#orders").DataTable({
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
