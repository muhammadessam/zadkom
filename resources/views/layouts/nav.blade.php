<nav class="mynav">
    <img src="{{asset('images/logo.png')}}">
    <ul>
        <li><a href="/" >   الرئيسية</a></li>
        <li><a href="#" >اتصل بنا</a></li>
        <li><a href="#" >اضف رأي</a></li>
        @if(auth()->check())
            <li>
                <div class="dropdown">
                    <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}   مرحباً
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('profile.index')}}">حسابي</a>
                        <a class="dropdown-item" href="#">طلباتي</a>
                        <a class="dropdown-item" href="{{route('nots')}}"><span class="badge badge-dark">{{count(auth()->user()->nots)}}</span> الاشعارات</a>
                        <a class="dropdown-item" href="{{route('logout')}}">تسجيل الخروج</a>
                    </div>
                </div>
            </li>
        @else
            <li><a href="{{route('login')}}" >تسجيل الدخول</a></li>
            <li><a href="{{route('register')}}" >تسجيل</a></li>
        @endif
    </ul>
</nav>
