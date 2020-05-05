@extends('Admin.Layout.layout')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th>اسم العضو</th>
                <th>محتوي الشكوي</th>
            </thead>
            <tbody>
                @foreach(@App\Report::all() as $report)
                <tr>
                    <td>{{$report->user->name}}</td>
                    <td>{{$report->body}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4 class="float-right m-2 col-md-12">ارسال رد </h4>
        <form action="{{route('nots.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">إلي</label>
                <select class="form-control p-1" name="user_id" id="">
                    @foreach(@App\Report::all() as $report)
                    <option value="{{$report->user->id}}">{{$report->user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">الرسالة</label>
                <textarea name="msg" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-success btn-block" type="submit">ارسال</button>
        </form>
    </div>
@endsection