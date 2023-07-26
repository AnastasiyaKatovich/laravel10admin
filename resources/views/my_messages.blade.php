@extends('layouts.base')
@section('content')
    <div>
        <h2>Мои СООБЩЕНИЯ</h2>
        @foreach ($my_messages as $message)
        <div class="row">
            <div class="col-2">
                @php
                    $mediaItems = $message->ticket->getMedia();
                    $ticket_src = optional(optional($mediaItems)[0])->getFullUrl();
                @endphp
                <a href="{{asset('ticket/'. $message->ticket_id)}}">
                    @if ($ticket_src)
                        <img src="{{$ticket_src}}" width="200px"/>
                    @else
                        <img src="https://w7.pngwing.com/pngs/372/98/png-transparent-drawing-ticket-film-sketch-circus-ticket-angle-text-rectangle.png" alt="" width="200px">
                    @endif

                    </div>

                    <div class="col-4">{{optional($message->ticket)->name}}</div>


                    <div class="col-6">{{$message->body}}</div>
                </a>
        </div>
        <hr>
        {{-- {{$message->ticket->name}}
        {!!$message->ticket->body!!} --}}
        {{-- <a href="{{asset('ticket/'.$ticket->id)}}">detailed</a> --}}
        {{-- <a href="{{asset('ticket/favorite/'.$ticket->id)}}">подробнее</a> --}}
        {{-- <a href="{{asset('ticket/favorite/'.$favorite->id.'/delete')}}">&times;</a>
        <hr> --}}
        @endforeach
    </div>



@endsection
