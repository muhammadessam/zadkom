@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة سائق</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('driver.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="الاسم ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" name="email" class="form-control" id="name"
                                           placeholder="الايميل ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">كلمة السر</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="تاكيد كلمة السر ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">تاكيد كلمة السر</label>
                                    <input type="password" name="password_confirm" class="form-control" id="password"
                                           placeholder="تاكيد كلمة السر ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">صورة شخصية</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="profile_pic" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">الصورة الشخصية</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الهاتف</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="الجوال ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">صورة البطاقة شخصية</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="id_pic" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">الصورة البطاقة الشخصية</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
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
    </script>
@endsection
