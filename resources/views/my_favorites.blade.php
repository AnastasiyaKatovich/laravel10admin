@extends('layouts.base')
@section('content')
    <div>
        <h2>Мои избранные билеты</h2>
        @foreach ($my_favorites as $favorite)
        {{optional($favorite->ticket)->name}}
        {!!optional($favorite->ticket)->body!!}
        {{-- <a href="{{asset('ticket/favorite/'.$ticket->id)}}">подробнее</a> --}}
        <a href="{{asset('ticket/favorite/'.$favorite->id.'/delete')}}">&times;</a>
        <hr>
        @endforeach
    </div>
@endsection
