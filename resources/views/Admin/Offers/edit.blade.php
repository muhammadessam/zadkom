@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة عرض</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('offer.update', $offer)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سعر العرض</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="قدم سعرك " value="{{$offer->price}}">
                                    @error('price')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>الطلب الخاص بالعضو</label>
                                    <select name="order_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\Models\Order::all()->where('status', 'pending') as $order)
                                            <option
                                                value="{{$order->id}}" {{$offer->order_id==$order->id ? 'selected' : ''}}>
                                                {{$order->user->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>السائق مقدم العرض</label>
                                    <select name="driver_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\Models\Driver::all()->where('status', 'free') as $driver)
                                            <option
                                                {{$offer->driver_id == $driver->id ? 'selected':''}} value="{{$driver->id}}">
                                                {{$driver->user->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal" name="accepted" {{$offer->accepted ? 'checked':''}}>
                                        مقبول
                                    </label>
                                </div>
                                <button class="btn btn-primary" type="submit">تعديل</button>
                            </form>
                        </div>
                    </div>
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
        $('.select2').select2();
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    </script>
@endsection
