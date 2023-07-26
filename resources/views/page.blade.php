@extends('layouts.base')
@section('content')
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col-3">
                    <h3>{{$page->name}}</h3>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-4">
                    <p>что-нибудь напиши</p>
                </div>
                <div class="col-8"><hr></div>
            </div>
            <div class="row py-4">
                <div class="col">
                    <p>{!!$page->body!!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
