@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل عروض السائقين</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('offer.create')}}">اضافة عرض</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="products" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <td>العرض</td>
                            <td>الحالة</td>
                            <td>مقدم الطلب</td>
                            <td>السائق</td>

                            <td>اجراء</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{$offer->price}}</td>
                                <td><span class="badge {{$offer->accepted ? 'badge-success' : 'badge-danger'}}">{{ $offer->accepted ? 'مقبول' : 'مرفوض' }}</span></td>
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
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('javascript')
    <script>
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

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
