@extends('layouts.base')
@section('content')
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="card">
                <div class="card-header row">
                    <div class="col-9">Беларусь-Минск-Спектакли-Балет</div>
                    <div class="col-1">
                        <x-favorite-icon :ticket-id="$ticket->id" height="60px" />
                    </div>
                    <div class="col-1">
                        <p>цена: {{$ticket->price}}</p>
                    </div>
                    <div class="col-1">
                        закрыть
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-9">
                        <h4 class="card-title">{{$ticket->name}}</h4>
                        <h5 class="card-title">event date: {{$ticket->event_datetime}}</h5>
                        <p class="card-text">{!!$ticket->body!!}</p>
                        <a href="#" class="btn btn-primary">Написать автору</a>
                        <a href="#" class="btn btn-primary">Телефон</a>
                    </div>
                    <div class="col-3 text-center">
                        @php
                            $mediaItems = $ticket->getMedia();
                            $ticket_src = optional(optional($mediaItems)[0])->getFullUrl();
                        @endphp
                        @if ($ticket_src)
                            <img src="{{$ticket_src}}" width="200px"/>
                        @else
                            <img src="https://w7.pngwing.com/pngs/372/98/png-transparent-drawing-ticket-film-sketch-circus-ticket-angle-text-rectangle.png" alt="" width="200px">
                        @endif
                    </div>
                </div>
                <div class="card-footer text-muted">
                  дата публикации: 11.22.23 <a href="">автор: Nastasi</a>
                </div>
              </div>
        </div>
    </div>
    <div>
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
