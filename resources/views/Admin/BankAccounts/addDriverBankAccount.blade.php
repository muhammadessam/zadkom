@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة رقم حساب  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('add.bank.driver.post', $driver)}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label> رقم الحساب</label>
                                    <input name="number" class="form-control" type="number">
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
