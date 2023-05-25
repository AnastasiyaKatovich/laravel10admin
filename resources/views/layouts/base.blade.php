<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('public/media/css.css')}}">
        <title>Document</title>
        <script src="media/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="media/main.js"></script> -->
        <script src="{{asset('media/main.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link href="media/main.css" rel="stylesheet"/> -->
        <link href="{{asset('media/main.css')}}" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">




        {{-- @stack('styles') --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>




        <nav class="navbar navbar-expand-lg navbar-light uppercase font-bold text-purple-800" style="background-color:#ffc107">
            <div class="container-fluid">
                <a class="navbar-brand rotate-a" href="/">FastTicket
                    <!-- <img src="media/img/еда/логотип.png" class="rotate-img"> -->
                </a>
                <div class="" id="navbarSupportedContent">
                    <ul class="navbar-nav top-menu me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">



                            @if($end == 'aboutus')
                        <span class="text-amber-950">
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
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="bi bi-person-circle"></i></a>
                        <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Вход</a></li>
                        <li><a class="dropdown-item" href="#">Регистрация</a></li> -->
                        @if(Auth::user())
                        <a href="{{asset('dashboard')}}">{{Auth::user()->name}}</a>
                        <a href="{{ route('logout') }}" class="dropdown-item logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @else
                        <!-- <a href="{{asset('login')}}">Login</a>
                        <a href="{{asset('register')}}">Register</a> -->
                        <li><a class="dropdown-item" href="{{asset('login')}}">Вход</a></li>
                        <li><a class="dropdown-item" href="{{asset('register')}}">Регистрация</a></li>
                        @endif
                    </ul>
                    </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCard">
                    <i class="bi bi-cart3"></i>
                    </a>
                    <div class="modal fade" id="exampleModalCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Корзина</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                            <tbody>
                                <tr>
                                <td>
                                    <img src="media/img/еда/готовая еда/пицца.png" alt="">
                                </td>
                                <td><a href="#">Пицца</a></td>
                                <td>25б.р.</td>
                                <td>1 шт.</td>
                                </tr>
                                <tr>
                                <td>
                                    <img src="media/img/еда/готовая еда/салат.png" alt="">
                                </td>
                                <td><a href="#">Салат</a></td>
                                <td>40б.р.</td>
                                <td>2 шт.</td>

                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Продолжить готовить</button>
                            <button type="button" class="btn btn-success">Оформить</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer>
            <section class="footer bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    Одна из трёх колонок
                    </div>
                    <div class="col-sm">
                    Одна из трёх колонок
                    </div>
                    <div class="col-sm">
                    Одна из трёх колонок
                    </div>
                </div>
            </div>
            </section>
        </footer>
    </body>
</html>
