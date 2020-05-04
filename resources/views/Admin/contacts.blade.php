@extends('Admin.Layout.layout')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <td>
                    الاسم
                </td>
                <td>
                    الجوال
                </td>
                <td>
                    البريد
                </td>
                <td>
                    المحتوي
                </td>
            </thead>
            <tbody>
                @foreach(@App\Contact::all() as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->content}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            <h4>ارسال رد</h4>
            <form method="post" action="{{route('send-mail')}}">
                @csrf
                <div class="form-group">
                    <label>ًإلي :</label>
                    <select class="form-control" style="height: 35px;" name="contact_id">
                        @foreach(@App\Contact::all() as $contact)
                            <option value="{{$contact->id}}">{{$contact->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>ًالرسالة :</label>
                    <textarea style="height: 300px" class="form-control" name="mail">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-block btn-success">ارسال</button>
            </form>
        </div>
    </div>
@endsection
