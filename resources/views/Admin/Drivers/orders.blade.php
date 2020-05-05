@extends('Admin.Layout.layout')
@section('content')
    @if($orders->count())
        <div class="driver_orders">
            <h3> طلبات السائق</h3>
            <h5>{{$orders[0]->driver->user->name}}</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم العميل</th>
                    <th scope="col">الحالة</th>
                    <th scope="col">عدد الاصناف</th>
                    <th scope="col">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->user->name}}</td>
                        <td>
                            @if($order->status == "pending")
                                معلق
                            @elseif($order->status == "in_shipping")
                                جاهز للشحن
                            @else
                                لم يحدد بعد
                            @endif
                        </td>
                        <td>{{$order->products->count()}}</td>
                        <td>{{ $order->created_at->format('y-m-d')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3>
            لا توجد لدية طلبات
        </h3>
    @endif
@endsection
