@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة سيارة </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label> الرئيسي</label>
                                    <select id="carmake" name="make_id" class="form-control select2"
                                            style="width: 100%;">
                                        @foreach(\App\Models\CarMake::all() as $make)
                                            <option value="{{$make->id}}">{{$make->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>الفرعي</label>
                                    <select id="carModel" name="model_id" class="form-control"
                                            style="width: 100%;">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>تاريخ التصنيع</label>
                                    <select name="manufacture_date" class="form-control select2" style="width: 100%;">
                                        @foreach(range(1960,now()->year) as $year)
                                            <option value="{{$year}}">{{$year}}</option>
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
                                                   id="exampleInputFile" value="{{old('car_id_pic')}}">

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
                                                   id="exampleInputFile" value="{{old('license_pic')}}">

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

                                @if(isset($driver_one))
                                    <input type="hidden" name="driver_id" value="{{$driver_one->id}}">
                                @else
                                    <div class="form-group">
                                        <label>اختر سائق</label>
                                        <select name="driver_id" class="form-control select2" style="width: 100%;">
                                            @foreach(\App\Models\Driver::all() as $driver)
                                                <option
                                                    value="{{$driver->id}}">{{$driver->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
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
        $('#carmake').on('change', function () {
            let id = this.value;
            $('#carModel').empty();
            $.ajax({
                url: route('getCarModel', id),
                type: 'get',
                dataType: 'json',
                success: function (jsonObject) {

                    let result = [];
                    result = $.map(jsonObject, function (x) {
                        return {
                            id: x.id,
                            text: x.title
                        };
                    });
                    $('#carModel').select2({
                        data: result,
                    });
                }
            });
        });
        $(document).ready(() => {
            $('.select2').select2();
            $.ajax({
                url: route('getCarModel', 1),
                type: 'get',
                dataType: 'json',
                success: function (jsonObject) {

                    let result = [];
                    result = $.map(jsonObject, function (x) {
                        return {
                            id: x.id,
                            text: x.title
                        };
                    });
                    $('#carModel').select2({
                        data: result,
                    });
                }
            });
        })
    </script>
@endsection
