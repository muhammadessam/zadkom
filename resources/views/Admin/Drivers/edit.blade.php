@extends('Admin.Layout.layout')
@section('content')
    <style>
        .bigger{
            width: 50% !important;
            height: 70% !important;
            position: fixed;
            z-index: 5;
            top: 50px;
            left: 250px;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">تعديل سائق</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('driver.update', $driver)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           value="{{$driver->user->name}}">
                                    @error('name')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" required name="email" value="{{$driver->user->email}}"
                                           class="form-control @error('email') is-invalid @enderror" id="name"
                                           placeholder="الايميل ">
                                    @error('email')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">كلمة السر</label>
                                    <input type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror" id="password"
                                           placeholder="تاكيد كلمة السر ">
                                    @error('password')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">تاكيد كلمة السر</label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password"
                                           placeholder="تاكيد كلمة السر ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الهاتف</label>
                                    <input type="tel" name="phone" value="{{$driver->user->phone}}"
                                           class="form-control  @error('phone') is-invalid @enderror" id="phone"
                                           placeholder="الجوال ">
                                    @error('phone')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputFile">صورة شخصية</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input  @error('profile_pic') is-invalid @enderror"
                                                    name="profile_pic"
                                                    id="exampleInputFile" value="{{old('profile_pic')}}">

                                                <label class="custom-file-label" for="exampleInputFile">الصورة
                                                    الشخصية</label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6 edit-profile_pic" style="border:1px solid;">
                                            <img onclick="change()" src="{{asset($driver->user->profile_pic)}}" id="pic" style="width:100%;height:150px;" id="profile_pic" alt="لم تعيين  بعد">
                                        </div>
                                        @error('profile_pic')
                                        <div style="margin-top: 2px" class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputFile">صورة البطاقة شخصية</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('id_pic') is-invalid @enderror"
                                                    name="id_pic"
                                                    id="exampleInputFile" value="{{old('id_pic')}}">

                                                <label class="custom-file-label" for="exampleInputFile">الصورة البطاقة
                                                    الشخصية</label>
                                            </div>
                                    
                                        </div>
                                        <div class="col-md-6 edit-profile_pic" style="border:1px solid;">
                                            <img onclick="change1()" src="{{asset($driver->id_pic)}}"  id="pic1" style="width:100%;height:150px;"  alt="لم تعيين  بعد">
                                        </div>
                                        @error('id_pic')
                                        <div style="margin-top: 2px" class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputFile">صورة رخصة القيادة</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('license_pic') is-invalid @enderror"
                                                    name="license_pic"
                                                    id="exampleInputFile" value="{{old('license_pic')}}">

                                                <label class="custom-file-label" for="exampleInputFile">الصورة رخصة
                                                    القيادة</label>
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-6 edit-profile_pic" style="border:1px solid;">
                                            <img onclick="change2()" src="{{asset($driver->license_pic)}}" id="pic2"  style="width:100%;height:150px;"  alt="لم تعيين  بعد">
                                        </div>
                                        @error('license_pic')
                                        <div style="margin-top: 2px" class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="exampleInputFile">صورة التامين</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('insurance_pic') is-invalid @enderror"
                                                    name="insurance_pic"
                                                    id="exampleInputFile" value="{{old('insurance_pic')}}">

                                                <label class="custom-file-label" for="exampleInputFile">الصورة التامين
                                                    الطبي</label>
                                            </div>
                                    
                                        </div>
                                        <div class="col-md-6 edit-profile_pic" style="border:1px solid;">
                                            <img onclick="change3()" src="{{asset($driver->insurance_pic)}}" id="pic3"  style="width:100%;height:150px;"  alt="لم تعيين  بعد">
                                        </div>
                                        @error('insurance_pic')
                                        <div style="margin-top: 2px" class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
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
    <script>
        function change() {
            var element = document.getElementById("pic");
            element.classList.toggle("bigger");
        }
        function change1() {
            var element = document.getElementById("pic1");
            element.classList.toggle("bigger");
        }
        function change2() {
            var element = document.getElementById("pic2");
            element.classList.toggle("bigger");
        }
        function change3() {
            var element = document.getElementById("pic3");
            element.classList.toggle("bigger");
        }
    </script>
@endsection
