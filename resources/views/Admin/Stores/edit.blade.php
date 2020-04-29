@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة متجر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('store.update' ,$store)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم </label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="الاسم  " value="{{$store->user->name}}">
                                    @error('name')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الايميل</label>
                                    <input type="email" required name="email" value="{{$store->user->email}}"
                                           class="form-control @error('email') is-invalid @enderror" id="email"
                                           placeholder="الايميل ">
                                    @error('email')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">كلمة السر</label>
                                    <input type="password"  name="password"
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
                                    <input type="password"  name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirmation"
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
                                    <input type="text" name="phone" value="{{$store->user->phone}}"
                                           class="form-control  @error('phone') is-invalid @enderror" id="phone"
                                           placeholder="الجوال ">
                                    @error('phone')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم المتجر</label>
                                    <input type="text" name="store_name"
                                           class="form-control @error('store_name') is-invalid @enderror"
                                           id="store_name"
                                           placeholder="الاسم  " value="{{$store->name}}">
                                    @error('store_name')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">الطول</label>
                                            <input type="text" name="lat"
                                                   class="form-control @error('lat') is-invalid @enderror" id="lat"
                                                   placeholder=" الطول " value="{{$store->lat}}">
                                            @error('lat')
                                            <div style="margin-top: 2px" class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العرض</label>
                                            <input type="text" name="long"
                                                   class="form-control @error('long') is-invalid @enderror" id="long"
                                                   placeholder="العرص  " value="{{$store->long}}">
                                            @error('long')
                                            <div style="margin-top: 2px" class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal"
                                               name="is_24" {{$store->is_24 ? 'checked' : ''}}>
                                        شغال 24 ساعة
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal" name="is_active" {{$store->is_active ? 'checked' : ''}}>
                                        فعال
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

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

    </script>
@endsection
