@extends('layouts.base')
@section('content')
    <div>
        <h2>Choose a ticket</h2>
@foreach ($tickets as $ticket)
    {!!$ticket->body!!}
    <a href="{{asset('ticket/'.$ticket->id)}}">подробнее</a>
    <img src="{{$ticket_media_arr[$ticket->id]}}" width="200px"/>
    <a href="{{asset('ticket/'.$ticket->id.'/favorite')}}">добавить в избранные</a>

    <hr />
@endforeach
    </div>
@endsection
