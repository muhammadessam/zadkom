@extends('layouts.myapp')
@section('content')
    <div class="row">
        <img src="{{asset('images/bg1.png')}}">
    </div>
    <div class="row title">
        <h3>المتاجر المتوفرة حالياً</h3>
    </div>
    <div class="container">
        <div class="stores row">
            <div class="col-md-3 store">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">11 متجر</h5>
                        <p class="card-text">متجر خاص باللحوم والاسماك</p>
                        <a href="{{route('store')}}" class="btn btn-primary">اصناف المتجر</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 store">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">متجر</h5>
                        <p class="card-text">متجر خاص باللحوم والاسماك</p>
                        <a href="#" class="btn btn-primary">اصناف المتجر</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 store">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">متجر</h5>
                        <p class="card-text">متجر خاص باللحوم والاسماك</p>
                        <a href="#" class="btn btn-primary">اصناف المتجر</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 store">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">متجر</h5>
                        <p class="card-text">متجر خاص باللحوم والاسماك</p>
                        <a href="#" class="btn btn-primary">اصناف المتجر</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 store">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/img3.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">متجر</h5>
                        <p class="card-text">متجر خاص باللحوم والاسماك</p>
                        <a href="#" class="btn btn-primary">اصناف المتجر</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
