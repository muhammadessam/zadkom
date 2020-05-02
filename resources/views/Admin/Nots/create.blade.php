@extends('Admin.Layout.layout')
@section('content')
    <style>
        .sent-not{
            padding: 30px;
            font-weight: 800;
            font-family: KARIM;
        }
    </style>
    <div class="sent-not">
        <form action="{{route('nots.store')}}" method="post">
            @csrf
            <h3>عمل اشعار جديد</h3>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">الاشعار</label>
                <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="for_all" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    كل المستخدمين
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="for_all" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    مستخدم واحد
                </label>
            </div>
            <select class="custom-select" name="user_id">
                <option selected>اختار مستخدم</option>
                @foreach(@App\User::all() as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-block btn-success" type="submit">ارسال</button>
        </form>
    </div>
@endsection