@extends('layouts.base')
@section('content')
    <div>
        <h2>Мои обьявления</h2>
        @foreach ($main_tickets as $ticket)
        {{$ticket->name}}
        {!!$ticket->body!!}
        {{-- <a href="{{asset('ticket/favorite/'.$ticket->id)}}">подробнее</a> --}}
        {{-- <a href="{{asset('ticket/favorite/'.$main->id.'/delete')}}">&times;</a> --}}
        <hr>
        @endforeach
    </div>
@endsection
