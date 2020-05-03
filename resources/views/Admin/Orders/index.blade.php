@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Order::all())}}</h3>
                            <p>عدد الطلبات</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add "></i>
                        </div>
                        <a href="{{route('order.index')."?filter=all"}}" class="small-box-footer">الكل<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Order::where('status','pending')->get())}}</h3>

                            <p>الطلبات المعلقة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                        <a href="{{route('order.index')."?filter=pending"}}" class="small-box-footer">معلق
                            <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Order::where('status','accepted')->get())}}</h3>

                            <p>الطلبات المقبولة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                        <a href="{{route('order.index')."?filter=accepted"}}" class="small-box-footer">مقبول
                            <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Order::where('status', 'completed')->get())}}</h3>

                            <p>الطلبات المكتملة</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person "></i>
                        </div>
                        <a href="{{route('order.index')."?filter=completed"}}" class="small-box-footer">مكتمل<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>


            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title col-11"> طلبات العملاء</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('order.create')}}">اضافة طلب</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="orders" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <td>رقم الطلب</td>
                            <td>العميل</td>
                            <td>الحالة</td>
                            <td>الوصف</td>
                            <td>المتجر</td>
                            <td>السائق</td>
                            <td>عدد العروض</td>
                            <td>اجمالي الفاتورة</td>
                            <td>اجراء</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    @if($order->status == "pending")
                                        معلق
                                    @elseif($order->status == "accepted")
                                        تم القبول من السائق
                                    @elseif($order->status == "completed")
                                        تم التوصيل والتسوية
                                    @endif
                                </td>
                                @if($order->description != null && $order->description!='')
                                    <td>{{$order->description}}</td>
                                @else
                                    <td>تم الطلب من خلاص متجر</td>
                                @endif

                                @if($order->store != null)
                                    <td>{{$order->store->name}}</td>
                                @else
                                    <td>تم الطلب من خلاص الوصف متجر غير موجود</td>
                                @endif

                                @if($order->driver != null)
                                    <td>{{$order->driver->user->name}}</td>
                                @else
                                    <td>لم يتم تعين سائق حتي الان</td>
                                @endif

                                <td>{{$order->offers->count()}}</td>
                                <td>
                                    {{$order->totalPrice ?$order->totalPrice:'-' }}
                                </td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('order.edit', $order)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('order.destroy', $order)}}"
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
            $("#orders").DataTable({
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
            $('#orders_filter').addClass('offset-8');
        });


        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
