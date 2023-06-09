@extends('layouts.base')
@section('content')
<div class="container overflow-hidden">
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
                <h3>Welcome to the FastTicket service</h3>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-4">
                <p>Choose the right category or use the catalog search</p>
            </div>
            <div class="col-8"><hr></div>
        </div>
        <div class="row">
            <div class="col-6 p-3 exmp6">
                <div class="row">
                    <img src="{{asset('media/img/concert-k.jpeg')}}" class="img-fluid" alt="...">
                <div class="p-3">
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>Concerts</p>
                            <i class="bi bi-arrow-right"></i>
                        </blockquote>
                    </figure>
                </div>
                </div>

            </div>
            <div class="col-6 p-3 exmp6">
                <div class="row">
                    <img src="{{asset('media/img/exhibition-k.jpeg')}}" class="" alt="...">
                <div class="p-3">
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>Exhibitions</p>
                            <i class="bi bi-arrow-right"></i>
                        </blockquote>
                    </figure>
                </div>
                </div>
            </div>
            <div class="col-6 p-3 exmp6 performance layered-image">
                <div class="row">
                    <img src="{{asset('media/img/theat.jpg')}}" class="" alt="...">
                <div class="p-3">
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>Performance</p>
                            <i class="bi bi-arrow-right"></i>
                        </blockquote>
                    </figure>
                </div>
                </div>
            </div>
            <div class="col-6 p-3 exmp6 all">
                <div class="row">
                    <img src="{{asset('media/img/theatr.jpg')}}" class="" alt="...">
                <div class="p-3">
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>All categories</p>
                            <i class="bi bi-arrow-right"></i>
                        </blockquote>
                    </figure>
                </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="row gy-5">
        <div class="col-6">
            <div class="p-3 border bg-light">
                <figure class="text-end">
                    <blockquote class="blockquote">
                        <p>Theatre</p>
                        <i class="bi bi-arrow-right"></i>
                    </blockquote>
                </figure>
            </div>
        </div>
        <div class="col-6">
            <div class="p-3 border bg-light">
                <figure class="text-end">
                    <blockquote class="blockquote">
                        <p>Show</p>
                        <i class="bi bi-arrow-right"></i>
                    </blockquote>
                </figure>
            </div>
        </div>
        <div class="col-6">
            <div class="p-3 border bg-light">
                <figure class="text-end">
                    <blockquote class="blockquote">
                        <p>Concerts</p>
                        <i class="bi bi-arrow-right"></i>
                    </blockquote>
                </figure>
            </div>
        </div>
        <div class="col-6">
            <div class="p-3 border bg-light">
                <figure class="text-end">
                    <blockquote class="blockquote">
                        <p>All categories</p>
                        <i class="bi bi-arrow-right"></i>
                    </blockquote>
                </figure>
            </div>
        </div>
    </div> --}}
</div>
@endsection
