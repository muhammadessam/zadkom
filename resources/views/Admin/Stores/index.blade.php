@extends('ADmin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">كل المتاجر</h3>
                    <div>
                        <a class="btn btn-primary" href="{{route('store.create')}}">اضافة متجر</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="stores" class="table table-bordered table-striped">
                        <thead>
                        <tr style="text-align: center">
                            <th>لاسم</th>
                            <th>الجوال</th>
                            <th>الصورة</th>
                            <th>المكان طول / عرض</th>
                            <th>24 شغال</th>
                            <th>فعال</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr style="text-align: center">
                                <td><a class="btn btn-outline-dark" href="{{route('store.show', $store)}}">{{$store->name}}</a></td>
                                <td>{{$store->user->phone}}</td>
                                <td><img style="width: 50px; height: 50px" src="{{asset($store->user->profile_pic)}}"
                                         alt="لم يضع صورة شخصية"></td>

                                <td style="text-align: center"><span class="badge badge-primary">{{$store->lat}}</span>
                                    / <span class="badge badge-primary">{{$store->long}}</span></td>
                                <td><span
                                        class="badge {{$store->is_24 ? 'badge-success' : 'badge-danger'}}">{{$store->is_24 ? 'تعم': 'لا'}}</span>
                                </td>
                                <td><span
                                        class="badge {{$store->is_active ? 'badge-success' : 'badge-danger'}}">{{$store->is_active ? 'نعم': 'لا'}}</span>
                                </td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('store.edit', $store)}}"><i
                                            class="fa fa-edit"></i></a>
                                    <form style="display: inline-block" action="{{route('store.destroy', $store)}}"
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
            $("#stores").DataTable({
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
