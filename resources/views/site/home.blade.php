@extends('layouts.myapp')
@section('content')
    @if(! $is_null && auth()->check())
        <div class="alert alert-warning" role="alert" style="margin: 0;text-align: center;">
        نرجو منك اكمال البيان الخاصه بكم ..شكراً 
            <a href="{{route('profile.edit',auth()->id())}}" class="alert-link">هنا</a>
        </div>
    @endif
    <div class="row">
        <img src="{{asset('images/bg1.png')}}">
    </div>
    <div class="row title">
        <h3>المتاجر المتوفرة حالياً</h3>
    </div>
    <div class="container">
        <div class="stores row">
            @foreach($stores as $store)
                <div class="col-md-3 store">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$store->name}}</h5>
                            <a href="{{route('store')}}" class="btn btn-primary">اصناف المتجر</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
