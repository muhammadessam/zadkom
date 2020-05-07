@extends('Admin.Layout.layout')
@section('content')
<div class="container">
    <h4 class="col-12 text-right"> الدول </h4>
    <form action="">
        <div class="form-group">
            <label for="">اسم الدولة</label>
            <input type="text" name="title" class="form-control">
        </div>
        <button class="mb-2 btn btn-block btn-success" type="submit">حفظ</button>
    </form>
    <table class="table">
        <thead class="thead-ligh">
            <tr>
                <th>الدولة</th>
                <th>اوامر</th>
            </tr>
            @foreach(@App\Country::all() as $c)
                <tr>
                    <td>{{$c->title}}</td>
                    <td>
                        <button class="btn btn-danger">حذف</button>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
</div>
@endsection