@extends('Admin.Layout.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة منتج</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم المنتج</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="اسم المنتج " value="{{old('name')}}">
                                    @error('name')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الوصف</label>
                                    <textarea required name="description" rows="7"
                                              class="form-control @error('description') is-invalid @enderror"
                                              id="description"
                                              placeholder="الوصف ">{{old('description')}}</textarea>
                                    @error('description')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">السعر</label>
                                    <input type="number" step=".000001" required name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="السعر">
                                    @error('price')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>المتجر</label>
                                    <select name="store_id" class="form-control select2" style="width: 100%;">
                                        @foreach(\App\Http\Models\Store::all() as $store)
                                            <option value="{{$store->id}}">{{$store->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">صورة المنتج</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('pic') is-invalid @enderror"
                                                   name="pic"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">صورة المنتج</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">ارسال صورة</span>
                                        </div>
                                    </div>
                                    @error('pic')
                                    <div style="margin-top: 2px" class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
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
        $('.select2').select2();
    </script>
@endsection
