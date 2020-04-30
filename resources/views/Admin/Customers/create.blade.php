@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة عميل</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="الاسم " value="{{old('name')}}">
                                    @error('name')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" required name="email" value="{{old('email')}}"
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
                                    <input type="password" required name="password"
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
                                    <input type="password" required name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password"
                                           placeholder="تاكيد كلمة السر ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">صورة شخصية</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('profile_pic') is-invalid @enderror"
                                                   name="profile_pic"
                                                   id="exampleInputFile" value="{{old('profile_pic')}}">

                                            <label class="custom-file-label" for="exampleInputFile">الصورة
                                                الشخصية</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
                                    @error('profile_pic')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الهاتف</label>
                                    <input type="text" name="phone" value="{{old('phone')}}"
                                           class="form-control  @error('phone') is-invalid @enderror" id="phone"
                                           placeholder="الجوال ">
                                    @error('phone')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal" name="is_active">
                                        فعال
                                    </label>
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
