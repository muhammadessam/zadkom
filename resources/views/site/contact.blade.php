@extends('layouts.myapp')
@section('content')
<style>
    form,input,textarea{
        text-align:right;
    }
</style>
 <div class="container mt-3">
    <form method="post" action="{{route('make-contact')}}">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="">
        </div>
        <div class="form-group">
            <label for="phone">رقم الجوال</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="0111111111">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">البريد الالكتروني</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">المحتوي</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class ="btn btn-block btn-success" type="submit">ارسال</button>
    </form>
 </div>
@endsection