@extends('layouts.base')
@section('content')
    <div>
        <h4 class="">{{$ticket->name}}</h4>
        <img src="{{$ticket_media_arr[$ticket->id]}}" width="100px"/>
        <hr />
        @foreach ($messages as $message )
        <p>{{$message->body}}</p>
        @endforeach
        <form action="{{asset('ticket/'.$ticket->id.'/message')}}" method="POST">
            @csrf
            <textarea name="body" id="" cols="30" rows="10" required></textarea>
            <input type="submit" value="save">
        </form>
    </div>
@endsection
