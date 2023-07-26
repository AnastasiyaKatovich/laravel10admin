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
            @foreach ($catalogs as $catalog)
            <div class="col-4 p-3 exmp6">
                <a href="{{asset('catalog/' .$catalog->id)}}">
                    <div class="row">
                        <img src="{{asset('media/img/concert-k.jpeg')}}" class="img-fluid" alt="...">
                        <div class="p-3">
                            <figure class="text-end">
                                <blockquote class="blockquote">
                                    <h4>{{$catalog->name}}</h4>
                                    {{-- <p>{{$catalog->body}}</p> --}}
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-4 p-3 exmp6 all">
                <a class="nav-link" href="{{asset('tickets')}}">
                <div class="row">
                    <img src="{{asset('media/img/theatr.jpg')}}" class="" alt="...">
                <div class="p-3">
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>All categories</p>
                        </blockquote>
                    </figure>
                </div>
                </div>
            </a>
            </div>
        </div>
        <div class="row py-5 border border-light border-right">
            <h4>Right now our online service offers you Hot Tickets <a href="{{asset('tickets')}}">{{App\Models\Ticket::count()}}</a>
                <i class="bi bi-fire"></i>
            </h4>

        </div>
        <div class="row d-flex justify-content-center border border-light border-right">
            <div class="col-4">
                <a class="btn btn-primary d-flex justify-content-center" href="{{asset('ticket')}}" role="button">Add your ticket</a>
            </div>
        </div>
    </div>
</div>
@endsection
