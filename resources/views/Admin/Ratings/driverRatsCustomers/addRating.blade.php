@extends('Admin.Layout.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة تقيم عميل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('customerRating.store')}}" method="post">

                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">التقيم قيمة من 1 الي 5</label>
                                    <input type="number" name="value" min="1" max="5"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="القيمة من 1 الي 5 " value="{{old('value')}}">
                                    @error('value')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>اختر سائق</label>
                                    <select name="driver_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\Models\Driver::all() as $driver)
                                            <option value="{{$driver->id}}">{{$driver->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="customer_id" value="{{$user->id}}">
                                </div>

                                <button class="btn btn-primary" type="submit">اضافة</button>
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
        $('.select2').select2()
    </script>
@endsection
