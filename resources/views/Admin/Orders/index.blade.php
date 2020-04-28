@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل طلبات العملاء</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('order.create')}}">اضافة طلب</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="orders" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <td>الطلب</td>
                            <td>مقدم الطلب</td>
                            <td>الحالة</td>
                            <td>المتجر</td>
                            <td>السائق</td>
                            <td>عدد العناصر</td>
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
                                    @elseif($order->status == "in_shiping")
                                        تحت الطلب
                                    @else
                                        لم تعرف بعد
                                    @endif
                                </td>
                                <td>{{$order->store->user->name}}</td>
                                <td>{{$order->driver->user->name}}</td>
                                <td>{{$order->products->count()}}</td>
                                <td>
                                    <?php $s = 0 ?>
                                    @foreach($order->products as $item)
                                        <?php $s = $s + $item->price ?>
                                    @endforeach
                                    <?php echo $s; ?>
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
