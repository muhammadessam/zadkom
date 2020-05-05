@extends('layouts.myapp')
@section('content')
    <div class="container">
        <h4 class="m-2 float-right">ارسال بلاغ</h4>
        <form action="{{route('report.store')}}" method="post">
            @csrf
            <div class="form-group ">
                <textarea name="body" id="body" cols="30" rows="10" style="text-align:right;" class=" form-control" placeholder="اكتب هنا"></textarea>
            </div>
            <button class="btn btn-success btn-block" type="submit">ارسال</button>
        </form>
    </div>
@endsection