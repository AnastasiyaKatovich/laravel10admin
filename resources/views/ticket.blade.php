@extends('layouts.base')
@section('content')
    <div>
        <h2>{!!$ticket->body!!}</h2>
    {!!$ticket->body!!}

    <img src="{{$ticket_media_arr[$ticket->id]}}" width="200px"/>

    <hr />
    </div>
@endsection
