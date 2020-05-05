@extends('Admin.Layout.layout')
@section('content')
    <div class="container container-fluid">
        <h1>لوحة التحكم شاشة العرض</h1>
        <div class="row pr-5 pl-5">
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-success-gradient">
                    <div class="inner">
                        <h3>{{count(\App\User::all())}}</h3>

                        <p>كل الاعضاء</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{route('customer.index')}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-warning-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Driver::all())}}</h3>

                        <p>كل السائقين</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person "></i>
                    </div>
                    <a href="{{route('driver.index').'?filter=all'}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-primary-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Driver::where('is_active', 1)->get())}}</h3>

                        <p>  السائقين المفعلين </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('driver.index').'?filter=activeDrivers'}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-info-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Driver::where('is_active', 0)->get())}}</h3>
                        <p>السائقين الغير مفعليين </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('driver.index').'?filter=deactiveDrivers'}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-success-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Store::where('is_active', 1)->get())}}</h3>

                        <p>المتاجر المفعله</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('store.index').'?filter=activeStores'}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-primary-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Store::where('is_active', 0)->get())}}</h3>

                        <p>المتاجر الغير مفعله </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('store.index').'?filter=deactiveStores'}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-danger-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Order::all())}}</h3>

                        <p>عدد الطبات </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('order.index')}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-info-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Models\Product::all())}}</h3>

                        <p>عدد المنتجات </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('product.index')}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-danger-gradient">
                    <div class="inner">
                        <h3>{{count(\App\Contact::all())}}</h3>

                        <p>رسائل اتصل بنا</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add "></i>
                    </div>
                    <a href="{{route('all-contacts')}}" class="small-box-footer">مشاهدة<i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
