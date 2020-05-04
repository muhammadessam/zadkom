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
    </div>
@endsection