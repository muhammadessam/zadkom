@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">تعديل طلب</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('order.update', $order)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الوصف</label>
                                    <textarea name="description"
                                              class="form-control @error('description') is-invalid @enderror" id="name"
                                              placeholder="الوصف ">{{$order->description}}</textarea>
                                    @error('description')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>اختر عميل</label>
                                    <select name="user_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\User::where('type', 'normal')->where('is_active', 1)->get() as $customer)
                                            <option
                                                value="{{$customer->id}}" {{$customer->id== $order->user->id ? 'selected':''}}>
                                                {{$customer->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>اختر متجر</label>
                                    <select name="store_id" class="form-control select2" style="width: 100%;">
                                        <option></option>
                                        @foreach(\App\Models\Store::where('is_active', 1)->get() as $store)
                                            <option
                                                value="{{$store->id}}" {{$store->id == $order->store_id ? 'selected':''}}>
                                                {{$store->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>اختر سائق</label>
                                    <select name="driver_id" class="form-control select2" style="width: 100%;">
                                        <option></option>
                                        @foreach(\App\Models\Driver::where('is_active', 1)->get() as $driver)
                                            <option
                                                value="{{$driver->id}}" {{$driver->id == $order->driver_id ? 'selected':''}}>
                                                {{$driver->user->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('driver_id')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>اختر الحالة</label>
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                        <option value="pending" {{$order->status == 'pending' ? 'selected':''}}>معلق
                                        </option>
                                        <option value="accepted" {{$order->status == 'accepted' ? 'selected':''}}>تم
                                            القبول بواسطة سائق
                                        </option>
                                        <option value="Completed" {{$order->status == 'Completed' ? 'selected':''}}>تم
                                            التوصيل
                                        </option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العرض</label>
                                            <input type="text" name="lat"
                                                   class="form-control @error('lat') is-invalid @enderror" id="lat"
                                                   placeholder=" العرض " value="{{$order->lat}}">
                                            @error('lat')
                                            <div style="margin-top: 2px" class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الطول</label>
                                            <input type="text" name="long"
                                                   class="form-control @error('long') is-invalid @enderror" id="long"
                                                   placeholder="الطول  " value="{{$order->long}}">
                                            @error('long')
                                            <div style="margin-top: 2px" class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">موافق</button>
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

    </script>
@endsection
