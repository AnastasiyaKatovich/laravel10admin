@extends('layouts.base')
@section('content')

{{-- <h4>Пожалуйста, чтобы добавить билет, выберите категорию.</h4>
@foreach ($catalogs as $catalog)
<blockquote class="blockquote">
    <a href="{{asset('catalog/' .$catalog->id)}}"><i class="bi bi-arrow-right"></i></a>
    <h4>{{$catalog->name}}</h4>
    <p>{{$catalog->body}}</p>

</blockquote>
@endforeach --}}

    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col-3">
                    <h3>Add a ticket</h3>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-4">
                    <h6>To add a new ticket, fill in the required fields</h6>
                </div>
                <div class="col-8"><hr></div>
            </div>
        </div>
    </div>
@include('includes/ticket_form')
@endsection
