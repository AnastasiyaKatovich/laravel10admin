@extends('layouts.base')
@section('content')
    <div>
            @include('includes/ticket_form', ['currencies'=>$currencies, 'href'=>'/ticket/'.$ticket->id])


        @foreach ($ticket->getMedia() as $file )
        <img src="{{$file->getFullUrl()}}" alt="" height="250px">
        <a href="{{asset('media/'.$file->id.'/delete')}}">&times;</a>
        @endforeach
        {{-- @php
        dd($ticket->getMedia());
        @endphp --}}
     </div>
@endsection
