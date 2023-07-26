@extends('layouts.base')
@section('content')
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col-3">
                    <div class="row">
                        <div class="col border border-light border-right">
                            <a href="{{asset('tickets')}}">All categories</a>
                        </div>
                        <div class="row border border-light border-right">
                            @include('includes/ticket_filter')
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <h4>{{$catalog->name}}</h4>
                        </div>
                        <hr>
                    </div>
                    <div class="row border border-light border-right py-2">
                        <div class="col-11">сортировка по дате</div>
                        <div class="col-1">
                            <i class="bi bi-border-all"></i>
                            <i class="bi bi-border-width"></i>
                        </div>
                    </div>
                    <hr>
                    @foreach ($catalog->tickets as $ticket)
                    @include('includes/ticket_all')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
