<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Document</title>
        <script src="media/js/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="media/main.js"></script> -->
        <script src="{{asset('media/js/main.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link href="media/main.css" rel="stylesheet"/> -->
        <link href="{{asset('media/css/main.css')}}" rel="stylesheet"/>
        <link href="{{asset('media/css/responsive.css')}}" rel="stylesheet"/>
        {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        {{-- @stack('styles') --}}
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <header>
            <div class="head-top container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-2 d-flex justify-content-center">
                            <a class="btn btn-primary btn-lg logo" href="/" role="button">FastTicket</a>
                        </div>
                        <div class="col-10 d-flex justify-content-end">
                            <div class="row">
                                <div class="col-12 p-2">
                                    <div class="row justify-content-end align-items-center">
                                        <form action="#" name="search" method="GET" class="col-lg-3 col-xl-4 d-flex justify-content-lg-end">
                                            <div class=" d-flex align-items-center">
                                                <input type="text" name="search" placeholder="catalog search">
                                                <button class="d-flex align-items-center justify-content-center"><i class="bi bi-search"></i></button>
                                            </div>
                                        </form>
                                        <div class="dropdown col-lg-2 col-sm-3 col-3 my-profil">
                                            @if(Auth::user())
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{Auth::user()->name}}
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                {{-- @if(Auth::user()) --}}
                                                <li>
                                                    <a class="dropdown-item" href="{{asset('dashboard')}}">Главная</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="">Мои сообщения</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{asset('ticket/main')}}">Мои обьявления</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{asset('ticket/favorite')}}">Избранное</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="">Личные данные</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item logout" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </ul>
                                                @else
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-person-fill"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item" href="{{asset('login')}}">Login</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{asset('register')}}">Register</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end p-2">
                                    <ul class="nav">
                                        <li class="nav-item ">
                                            @if($end == 'aboutus')
                                            <p><strong>About us</strong></p>
                                            @else
                                            <a class="nav-link" href="{{asset('aboutus')}}">About us</a>
                                            @endif
                                        </li>
                                        <li class="nav-item">
                                            @if($end == 'help')
                                            <p><strong>Help</strong></p>
                                            @else
                                            <a class="nav-link" href="{{asset('help')}}">Help</a>
                                            @endif
                                        </li>
                                        <li class="nav-item">
                                            @if($end == 'tickets')
                                            <p><strong>Catalog</strong></p>
                                            @else
                                            <a class="nav-link" href="{{asset('tickets')}}">Catalog</a>
                                            @endif
                                        </li>
                                        <li class="nav-item">
                                            @if($end == 'ticket')
                                            <p><strong>Add a ticket</strong></p>
                                            @else
                                            <a class="nav-link" href="{{asset('ticket')}}">Add a ticket</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <section class="footer bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h5>HotTicket</h5>
                        <div>hot tickets worldwide</div>
                    </div>
                    <div class="col-sm">
                        <div>все категории</div>
                        <div>о нас</div>
                        <div>контакты</div>
                        <div>политика конфиденциальности</div>
                    </div>
                    <div class="col-sm">
                        <div>поиск по каталогу</div>
                        <div>мы в соц сетях</div>
                    </div>
                </div>
            </div>
            </section>
        </footer>
    </body>
</html>


{{-- <div class="head-top container-fluid">
                <div class="container">
                    <div class="row justify-content-end align-items-center">
                        <form action="#" name="search" method="GET" class="col-lg-3 col-xl-4 d-flex justify-content-lg-end">
                            <div class=" d-flex align-items-center">
                                <input type="text" name="search" placeholder="catalog search">
                                <button class="d-flex align-items-center justify-content-center"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                        <div class="dropdown col-lg-2 col-sm-3 col-3 my-profil">
                            @if(Auth::user())
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{asset('dashboard')}}">Главная</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Мои сообщения</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Мои обьявления</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{asset('ticket/favorite')}}">Избранное</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Личные данные</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                                @else
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-fill"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{asset('login')}}">Login</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{asset('register')}}">Register</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <a href="/" class="logo col-lg-2 col-sm-3 d-flex justify-content-center">
                            <h3>FastTicket</h3>
                        </a>
                        <ul class="nav d-flex  col-sm-10 col-lg-6 col-xl-5 justify-content-start">
                            <li class="nav-item ">
                                @if($end == 'aboutus')
                            <span class="">
                                ABOUT US
                            </span>
                                @else
                                <a class="nav-link" href="{{asset('aboutus')}}">About us</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if($end == 'help')
                                <span class="text-amber-950">
                                    help
                                </span>
                                @else
                                <a class="nav-link" href="{{asset('help')}}">Help</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if($end == 'tickets')
                                <span class="text-amber-950">
                                    Выбрать билет
                                </span>
                                @else
                                <a class="nav-link" href="{{asset('tickets')}}">Choose a ticket</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if($end == 'ticket')
                                <span class="text-amber-950">
                                    Создать обьявление
                                </span>
                                @else
                                <a class="nav-link" href="{{asset('ticket')}}">Add a ticket +</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
