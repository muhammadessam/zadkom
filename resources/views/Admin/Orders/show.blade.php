@extends('Admin.Layout.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الطلب رقم {{$order->id}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>

                        <tr>
                            <td>رقم الطلب</td>
                            <td>
                                <div class="badge badge-primary">
                                    <div>{{$order->id}}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>اسم العميل</td>
                            <td>
                                <div>
                                    <div><strong>{{$order->user->name}}</strong></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>حالة الطلب</td>
                            <td>
                                <div class="badge badge-primary">
                                    <div>{{$order->status}}</div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>وصف الطلب</td>
                            <td>
                                <div>
                                    <div>{{$order->description}}</div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>المتجر</td>
                            <td>
                                <div>
                                    @if($order->store != null)
                                        <div class="badge badge-success">{{$order->store->name}}</div>
                                    @else
                                        <div class="alert alert-error">تم الطلب من خلاص الوصف ولم يتم اختار متجر موجود
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>اسم السائق</td>
                            <td>
                                <div>
                                    @if($order->driver != null)
                                        <div class="badge badge-success">{{$order->driver->user->name}}</div>
                                    @else
                                        <div class="alert alert-error">لم يتم تعين سائق
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>اجمال الفاتورة</td>
                            <td>
                                <div>
                                    <div><strong>{{$order->totalPrice ? $order->totalPrice: '-'}}</strong></div>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title col-10">كل عروض السائقين</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('addOrderOffer', $order)}}">اضافة عرض</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="offers" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <td>العرض</td>
                            <td>الحالة</td>
                            <td>صاحب الطلب</td>
                            <td>السائق</td>

                            <td>اجراء</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->offers as $offer)
                            <tr>
                                <td>{{$offer->price}}</td>
                                <td><span
                                        class="badge {{$offer->accepted ? 'badge-success' : 'badge-danger'}}">{{ $offer->accepted ? 'مقبول' : 'مرفوض' }}</span>
                                </td>
                                <td>{{$offer->order->user->name}}</td>
                                <td>{{$offer->driver->user->name}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('offer.edit', $offer)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('offer.destroy', $offer)}}"
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

        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $("#offers").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous": "السابق"
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_ سائقين",
                    "entries": "سائق",
                    "zeroRecords": "لا توجد نتائج مطابقة",
                    "emptyTable": "لا توجد بيانات للعرض",
                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#offers_filter').addClass('offset-8');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>

@endsection
