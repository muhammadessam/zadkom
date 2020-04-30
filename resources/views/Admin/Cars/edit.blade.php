@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">تعديل سيارة </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('car.update', $car)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">النوع</label>
                                    <input type="text" name="type"
                                           class="form-control @error('type') is-invalid @enderror" id="type"
                                           placeholder="النوع " value="{{$car->type}}">
                                    @error('type')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الموديل</label>
                                    <input type="text" required name="model" value="{{$car->model}}"
                                           class="form-control @error('model') is-invalid @enderror" id="model"
                                           placeholder="الموديل ">
                                    @error('model')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>تاريخ التصنيع</label>
                                    <select name="manufacture_date" class="form-control select2" style="width: 100%;">
                                        @foreach(range(1960,now()->year) as $year)
                                            <option
                                                value="{{$year}}" {{$car->manufacture_date==$year ? 'selected' :''}}>{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">هوية السيارة</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('car_id_pic') is-invalid @enderror"
                                                   name="car_id_pic"
                                                   id="exampleInputFile">

                                            <label class="custom-file-label" for="exampleInputFile">هوية السيارة</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
                                    @error('car_id_pic')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">صورة رخصة السيارة</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('license_pic') is-invalid @enderror"
                                                   name="license_pic"
                                                   id="exampleInputFile">

                                            <label class="custom-file-label" for="exampleInputFile">صورة رخصة
                                                السيارة</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
                                    @error('license_pic')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>اختر سائق</label>
                                    <select name="driver_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\Models\Driver::all() as $driver)
                                            <option
                                                value="{{$driver->id}}" {{$car->driver_id==$driver->id?'selected':''}}>{{$driver->user->name}}</option>
                                        @endforeach
                                    </select>
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
        $(function () {
            $("#drivers").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous": "السابق"
                    }
                },
                "info": false,
            });
        });
        $('.select2').select2();
    </script>
@endsection