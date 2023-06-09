@extends('layouts.base')
@section('content')
    <div>
    <h4 class="">{{$ticket->name}}</h4>
    <div>дата мероприятия: {{$ticket->event_datetime}}</div>
    <div>{!!$ticket->body!!}</div>
    <img src="{{$ticket_media_arr[$ticket->id]}}" width="200px"/>
    <hr />
    </div>
@endsection
