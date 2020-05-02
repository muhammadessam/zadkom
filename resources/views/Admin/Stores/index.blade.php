@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Store::all())}}</h3>

                            <p>كل المتاجر</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add "></i>
                        </div>
                        <a href="{{route('store.index')."?filter=all"}}" class="small-box-footer">الكل<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Store::where('is_active', 1)->get())}}</h3>

                            <p>متجر مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person "></i>
                        </div>
                        <a href="{{route('store.index')."?filter=activeStores"}}" class="small-box-footer">الفالعين<i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h3>{{count(\App\Models\Store::where('is_active', 0)->get())}}</h3>

                            <p>متجر غير مفعل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                        <a href="{{route('store.index')."?filter=deactiveStores"}}" class="small-box-footer">غير فعال
                            <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title col-11"> المتاجر</h3>
                    <div class="col-1">
                        <a class="btn btn-primary" href="{{route('store.create')}}">اضافة متجر</a>
                    </div>
                </div>
                <div class="card-header d-flex justify-content-lg-between">
                    <div class="col-10 d-inline">
                        <h3 class="card-title">العدد <span class="badge badge-primary">{{count($stores)}}</span></h3>
                    </div>
                    <div class="col-2">
                        <form class="form-inline" style="width: 100%" action="{{route('store.index')}}" method="get">
                            <div class="form-group" style="width: 65%">
                                <select style="width: 100%;" class="form-control" name="filter" id="filter">
                                    <option value="all" {{request()->get('filter')=='all' ? 'selected':''}}>
                                        الكل
                                    </option>
                                    <option
                                        value="is24Active" {{request()->get('filter')=='is24Active' ? 'selected':''}}>
                                        يعمل 24 ساعة
                                    </option>
                                    <option
                                        value="isNot24Active" {{request()->get('filter')=='isNot24Active' ? 'isNot24Active':''}}>
                                        لا يعمل 24 ساعة
                                    </option>
                                    <option
                                        value="activeStores" {{request()->get('filter')=='activeStores' ? 'selected':''}}>
                                        المتاجر الفعالة
                                    </option>
                                    <option
                                        value="deactiveStores" {{request()->get('filter')=='deactiveStores' ? 'selected':''}}>
                                        المتاجر الموقوفة
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
                                <td><a class="btn btn-outline-dark"
                                       href="{{route('store.show', $store)}}">{{$store->name}}</a></td>
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
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_  متاجر",
                    "emptyTable": "لا توجد بيانات",
                    "zeroRecords": "لم نجد بيانات مطابقة",

                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#stores_filter').addClass('text-left');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
