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
            <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
                <i class="fas fa-arrow-up"></i>
            </button>
            <div class="head-top container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                        <button type="button" class="btn btn-primary btn-lg">Большая кнопка</button>
                        </div>
                        <div class="col-1">
                        <button type="button" class="btn btn-purple"><i class="fas fa-heart pr-2" aria-hidden="true"></i>Heart</button>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input id="search-input" type="search" id="form1" class="form-control" />
                                    <label class="form-label" for="form1">Search</label>
                                </div>
                                <button id="search-button" type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-1">
                        <button type="button" class="btn btn-elegant"><i class="far fa-user pr-2" aria-hidden="true"></i>User</button>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-unique"><i class="fas fa-wifi pr-2" aria-hidden="true"></i>Wifi</button>
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
