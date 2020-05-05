@extends('Admin.Layout.layout')
@section('content')
    <div class="container">
        <h3>الصفحات</h3>
        <a href="{{route('pages.create')}}" class="btn btn-success">اضافة صفحة جديدة</a>
        <table class="table">
            <thead>
                <tr>
                    <th >عنوان الصفحة</th>
                    <th >تاريخ الانشاء</th>
                    <th >اوامر</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{$page->name}}</td>
                    <td>{{$page->created_at->format('y-m-d')}}</td>
                    <td>
                        <button class="btn btn-info">تعديل</button>
                        <form style="float: right;" action="{{route('pages.destroy',$page->id)}}" method="POST">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <button type="submit" class="btn btn-danger" >حذف</button>
                        </form>
                        <a href="{{route('page',$page->id)}}" class="btn btn-primary" >عرض</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
