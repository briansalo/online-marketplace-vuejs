<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- for fontawesome -->
    <script src="https://kit.fontawesome.com/5cffec2ddd.js" crossorigin="anonymous"></script>


<!--------------for ajax and jquery ------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<Style>

.disable_link a{
    text-decoration: none;
    color: black;
}   


/*css for navbar*/
 .dropdown:hover>.dropdown-menu{
    display: block;
 }
 @media only screen and(max-width:9991px){
    .navbar-hover .show> .dropdown-toggle::after{
        transform: rotate(-90deg)
    }
 }
 @media only screen and (min-width:492px){
    .navbar-hover .collapse ul li{position: relative;}
    .navbar-hover .collapse ul li:hover > ul {display: block;}
    .navbar-hover .collapse ul ul{position: absolute; top: 100%; left: 0; min-width: 250px; display: none;}
    .navbar-hover .collapse ul ul ul{position: absolute; top: 0; left: 100%; min-width: 250px; display: none;}
 }

/*css for sidevar in advertisement*/
    .vertical-menu a{
        background-color:#fff;
        color: #000;
        display: block;
        padding: 12px;
        text-decoration: none;
    }
    .vertical-menu a:hover{
        background-color:#80bec9;
        color: #fff;
    }
    .vertical-menu a.active{
        background-color: #02c8eb;
        color:  #fff;
    }


/*customized the next and prev icon of carousel in frontdesign.blade.php*/
.carousel-control-prev-icon{

  height: 25px;
  width: 25px;
  margin-right: 80px;
  border-radius: 50%;
  border: 1px solid white;
  background-color: black;
 
}

.carousel-control-next-icon{
  height: 25px;
  width: 25px;
  margin-left: 80px;
  border-radius: 50%;
  border: 1px solid white;
  background-color: black;
}
.carousel-control-next-icon:after
{
  content: '';  
  margin-left: 150px;
  font-size: 55px;
  color: white;
}

.carousel-control-prev-icon:after {
  content: '';
  margin-right: 150px;
  font-size: 55px;
  color: white;

}

</Style>

</head>
<body>
<div id="app">
     <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
            
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1><b>Marketplace</b></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('login') }}" style="color:black">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" style="color:black">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="dropdown">
                                  <button class="dropdown-toggle btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ucwords(auth()->user()->name)}}
                                  </button>

                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @if(Auth::check()&& Auth::user()->isadmin==1)
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                @else
                                   <a class="dropdown-item" href="{{ route('ads.index') }}">Dashboard</a>
                                @endif
                                
                                @if(!Auth::user()->email_verified_at and Auth::user()->isadmin==0)
                                    <a class="dropdown-item" href="{{ route('message.view') }}">Message</a>
                                @endif
                                    <a class="dropdown-item" href="{{ route('log_out') }}">Log Out</a>
                              </ul>
                            </div>
                        @endguest
                    </ul>
                </div>     
             </nav>
             <hr>
       
<!--second nav bar-->
<nav class="navbar navbar-expand-md navbar-light bg-info  navbar-hover">

<!--https://mdbootstrap.com/snippets/jquery/mdbootstrap/949045#css-tab-view-->
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
        aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarHover">
        <ul class="container-fluid navbar-nav d-flex justify-content-center">
            <!--$menus variable came from appserviceprovider-->
            @foreach($menus as $menu)
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="{{route('find.base.on.category',$menu->slug)}}"
                    data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                    aria-expanded="false" style="color:white">
                    {{$menu->name}}
                </a>
                <ul class="dropdown-menu">
                    @foreach($menu->subcategory as $submenu)
                    <li>
                        <a class="dropdown-item dropdown-toggle"
                        href="{{route('find.base.on.subcategory',[$menu->slug,$submenu->slug])}}">{{$submenu->name}}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($submenu->childcategory as $childmenu)
                            <li>
                                <a class="dropdown-item" 
                                href="{{route('find.base.on.childcategory',[$menu->slug,$submenu->slug,$childmenu->slug])}}">{{$childmenu->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach

        </ul>
    </div>
</nav>
 </div><!--container-->

        <main class="py-4">
            @yield('content')
        </main>
</div>




</body>
</html>