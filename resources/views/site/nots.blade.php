@extends('layouts.myapp')
@section('content')
<style>
    h3{
        text-align:center;
    }
    .container{
        margin-top:30px;
    }
    .list-group-item.active{
        background-color: #ffa500 !important;
        border-color: #3490dc00 !important;
    }
</style>
<div class="container">
    <h3>الاشعارات</h3>
    <hr>
    <div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            @foreach(auth()->user()->nots as $not)
            <a class="list-group-item list-group-item-action" id="list-{{$not->id}}-list" data-toggle="list"
             href="#list-{{$not->id}}" role="tab" aria-controls="{{$not->id}}">{{$not->created_at}}</a>
            @endforeach
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            @foreach(auth()->user()->nots as $not)
            <div class="tab-pane fade show" id="list-{{$not->id}}" role="tabpanel" aria-labelledby="list-{{$not->id}}-list">{{$not->msg}}</div>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection