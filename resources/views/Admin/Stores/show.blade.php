@extends('Admin.Layout.layout')

@section('content')

    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 offset-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset($store->user->profile_pic)}}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$store->name}}</h3>

                                <p class="text-muted text-center">{{$store->user->email}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            الهاتف
                                        </div>
                                        <div>
                                            {{$store->user->phone}}
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            متاح 24 ساعة
                                        </div>
                                        <div
                                            class="badge badge-primary {{$store->is_24 ? 'badge-success' : 'badge-danger'}}">
                                            {{$store->is_24 ? 'نعم' : 'لا'}}
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            المتجر فعال ام لا
                                        </div>
                                        <div
                                            class="badge badge-primary {{$store->is_active ? 'badge-success' : 'badge-danger'}}">
                                            {{$store->is_active ? 'نعم' : 'لا'}}
                                        </div>
                                    </li>
                                </ul>

                                <a href="{{route('store.edit', $store)}}" class="btn btn-primary btn-block"><b>تعديل</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <div class="row ">
                    <div class="col-10 card offset-1">
                        <div class="card-header d-flex justify-content-lg-between">
                            <h3 class="card-title">كل الطلبات</h3>
                            <div>
                                <a class="btn btn-primary" href="{{route('product.create')}}">اضافة طلب</a>
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
                                @foreach($store->orders as $order)
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
                <div class="row ">
                    <div class="col-10 card offset-1">
                        <div class="card-header d-flex justify-content-lg-between">
                            <h3 class="card-title">كل المنتجات</h3>
                            <div>
                                <a class="btn btn-primary" href="{{route('product.create')}}">اضافة منتج</a>
                            </div>
                        </div>
                        <div class=" card-body card-primary">
                            <table id="products" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <td>الاسم</td>
                                    <td>الوصف</td>
                                    <td>السعر</td>
                                    <td>صورة المنتج</td>
                                    <td>المتجر</td>
                                    <td>اجراء</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($store->products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{$product->price}}</td>
                                        <td><img src="{{asset($product->pic)}}" alt="صورة المنتج"
                                                 style="width: 50px;height: 50px;"></td>
                                        <td>{{$product->store->name}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-primary" href="{{route('product.edit', $product)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form style="display: inline-block"
                                                  action="{{route('product.destroy', $product)}}"
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

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

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
        $(function () {
            $("#products").DataTable({
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
