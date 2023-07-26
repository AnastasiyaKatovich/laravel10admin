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
        <div>event data: {{$ticket->event_datetime}}</div>
    </div>
    <div class="col-2">
        <a href="{{asset('ticket/'.$ticket->id)}}">detailed</a>
    </div>
    <div class="col-3 d-flex justify-content-around">
        <a href="">цена</a>
        @if(in_array($ticket->id, $favorite))
            <a href="{{asset('ticket_favorite/'.$ticket->id.'/delete')}}"><i class="bi bi-heart-fill"></i></a>
        @else
            <a href="{{asset('ticket/'.$ticket->id.'/favorite')}}"><i class="bi bi-heart"></i></a>
        @endif
        <a href=""><i class="bi bi-envelope"></i></a>
    </div>
</div>
<div class="row text-end border border-light border-right py-2">
    <div class="col">дата публикации</div>
</div>
<hr>
