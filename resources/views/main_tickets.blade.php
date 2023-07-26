@extends('layouts.base')
@section('content')
    {{-- <div>
        <h2>Мои обьявления</h2>
        @foreach ($main_tickets as $ticket)
        {{$ticket->name}}
        {!!$ticket->body!!}
        <a href="{{asset('ticket/'.$ticket->id)}}">detailed</a>
        <hr>
        @endforeach
    </div> --}}



    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row py-4">
                <div class="col">
                    <h4> Мои билеты.обьявления.публикации</h4>

                </div>
            </div>
            <div class="row">
                    @foreach ($main_tickets as $ticket)
                    <div class="row border border-light border-right py-2">
                        <div class="col-2">
                            @php
                                $mediaItems = $ticket->getMedia();
                                $ticket_src = optional(optional($mediaItems)[0])->getFullUrl();
                            @endphp
                            @if ($ticket_src)
                                <img src="{{$ticket_src}}" width="150px"/>
                            @else
                                <img src="https://w7.pngwing.com/pngs/372/98/png-transparent-drawing-ticket-film-sketch-circus-ticket-angle-text-rectangle.png" alt="" width="150px">
                            @endif
                        </div>
                        <div class="col-5">
                            <h6>{{$ticket->name}}</h6>
                        </div>
                        <div class="col-2">
                            <a href="{{asset('ticket/'.$ticket->id)}}">просмотреть</a>
                        </div>
                        <div class="col-3 d-flex justify-content-around">
                            <a href="{{asset('ticket/main/'.$ticket->id.'/delete')}}">&times;</a>
                            <a href="{{asset('ticket/'.$ticket->id.'/edit')}}">ред</a>
                        </div>
                    </div>
                    <div class="row text-end border border-light border-right py-2">
                        <div class="col">дата публикации</div>
                    </div>
                    <hr>






                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
