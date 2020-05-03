<!doctype html>
<html lang="en">
    @include('layouts.head')
    <style>
        .close-app{
            width: 100%;
            height: 100%;
            background-color: orange;
            text-align: center;
            padding: 50px;
        }
        .clos-app img{
            margin:50px;
        }
    </style>
<body>
    <?php $set = @App\Setting::first(); ?>
    @if( $set != null)
        @if(! $set->is_closed)
            @include('layouts.nav')
            @yield('content')
            @include('layouts.footer')
        @else
            <div class="close-app">
                <img src="{{asset('images/logo.png')}}" alt="" >
                {!! $set->close_msg !!}
            </div>
        @endif
    @endif
</body>
</html>
