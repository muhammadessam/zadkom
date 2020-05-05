@extends('Admin.Layout.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h3>{{count(\App\User::where('type', 'normal')->get())}}</h3>

                            <p>كل العملاء</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add "></i>
                        </div>
                        <a href="{{route('customer.index')."?filter=all"}}" class="small-box-footer">الكل<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h3>{{count(\App\User::where('type', 'normal')->where('is_active', 1)->get())}}</h3>

                            <p>عميل مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person "></i>
                        </div>
                        <a href="{{route('customer.index')."?filter=active"}}" class="small-box-footer">الفالعين<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h3>{{count(\App\User::where('type', 'normal')->where('is_active', 0)->get())}}</h3>

                            <p>عميل غير مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                        <a href="{{route('customer.index')."?filter=notActive"}}" class="small-box-footer">غير فعال
                            <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title col-11"> العملاء</h3>
                    <a class="btn btn-primary col-1 " style="margin-left: 10px;" href="{{route('customer.create')}}">اضافة</a>
                </div>
                <div class="card-header d-flex justify-content-lg-between">
                    <div class="col-10 d-inline">
                        <h3 class="card-title">العدد <span class="badge badge-primary">{{count($customers)}}</span></h3>
                    </div>
                    <div class="col-2">
                        <form class="form-inline" style="width: 100%" action="{{route('customer.index')}}" method="get">
                            <div class="form-group" style="width: 65%">
                                <select style="width: 100%;" class="form-control" name="filter" id="filter">
                                    <option value="all" {{request()->get('filter')=='all' ? 'selected':''}}>
                                        الكل
                                    </option>
                                    <option
                                        value="active" {{request()->get('filter')=='active' ? 'selected':''}}>
                                        فعال
                                    </option>
                                    <option
                                        value="notActive" {{request()->get('filter')=='notActive' ? 'isNot24Active':''}}>
                                        غير فعال
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
                    <table style="text-align: center" id="users" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>التفعيل</th>
                            <th>الصورة</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><span
                                        class="badge {{$user->is_active ? "badge-success" : "badge-danger"}} ">{{$user->is_active ? "فعال" : "موقوف"}}</span>
                                </td>
                                <td><img style="width: 50px; height: 50px" src="{{asset($user->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary"
                                       href="{{route('customer.show', $user)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary" href="{{route('customer.edit', $user)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('customer.destroy', $user)}}"
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
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_  عميل",
                    "emptyTable": "لا توجد بيانات",
                    "zeroRecords": "لم نجد بيانات مطابقة",

                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#users_filter').addClass('text-left');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>

@endsection
