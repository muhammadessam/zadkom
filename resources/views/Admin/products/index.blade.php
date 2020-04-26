@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل المنتجات</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('product.create')}}">اضافة منتج</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
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
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{asset($product->pic)}}" alt="صورة المنتج" style="width: 50px;height: 50px;"></td>
                                <td>{{$product->store->name}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('product.edit', $product)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('product.destroy', $product)}}"
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
