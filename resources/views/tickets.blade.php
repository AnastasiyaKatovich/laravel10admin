@extends('layouts.base')
@section('content')
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col">
                    <h3>Catalog to the FastTicket service</h3>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-4">
                    <p>Choose a ticket or use the catalog search</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <select name="catalog_id" class="form-select">
                        <option selected>categories</option>
                        {{-- @foreach($catalogs as $catalog)
                        <option value={{$catalog->id}}>{{$catalog->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            @foreach ($tickets as $ticket)
            <div class="row">
                <div class="col-5">
                    <h6>{{$ticket->name}}</h6>
                    <div>{{$ticket->event_datetime}}</div>
                </div>
                <div class="col-5">
                    <div>{!!$ticket->body!!}</div>
                    <a href="{{asset('ticket/'.$ticket->id)}}">detailed</a>
                </div>
                <div class="col-2 d-flex justify-content-around">
                    <a href="{{asset('ticket/'.$ticket->id.'/favorite')}}"><i class="bi bi-heart"></i></a>
                    <a href=""><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
@endsection
