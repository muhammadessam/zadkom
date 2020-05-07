@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">تعديل رقم حساب </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('edit.bank.driver.post', $driver)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label> رقم الحساب</label>
                                    <input name="number" class="form-control" type="number"
                                           value="{{$driver->bankAccount->account_number}}">
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
