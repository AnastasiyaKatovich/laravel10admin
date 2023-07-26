@extends('layouts.base')
@section('content')
<div class="container overflow-hidden">
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col border border-light border-right">
                        <ul><a href="{{asset('tickets')}}">Categories:</a>
                        @foreach ($catalogs as $catalog)
                            <a href="{{asset('catalog/' .$catalog->id)}}">
                                <li>{{$catalog->name}}</li>
                            </a>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row border border-light border-right">

                @include('includes/ticket_filter')
                </div>
            </div>
            <div class="col-9">
                <div class="row border border-light border-right py-2">
                    @if (request()->sort_by_date)
                    <a class="col-11" href="?sort_by_date={{(request()->sort_by_date=='ASC')?'DESC':'ASC'}}">sort by date event <i class="bi  {{(request()->sort_by_date=='ASC')?'bi-arrow-up':'bi bi-arrow-down'}}"></i></a>
                   @else
                   <a class="col-11" href="?sort_by_date=ASC">sort by date event <i class="bi bi-arrow-up"></i></a>
                    @endif

                    @if (request()->sort_by_id)
                    <a class="col-11" href="?sort_by_id={{(request()->sort_by_id=='ASC')?'DESC':'ASC'}}">sort by date create<i class="bi  {{(request()->sort_by_id=='ASC')?'bi-arrow-up':'bi bi-arrow-down'}}"></i></a>
                   @else
                   <a class="col-11" href="?sort_by_id=ASC">sort by date create<i class="bi bi-arrow-up"></i></a>
                    @endif

                    <div class="col-1">
                        <i class="bi bi-border-all"></i>
                        <i class="bi bi-border-width"></i>
                    </div>
                </div>
                @foreach ($tickets as $ticket)
                @include('includes/ticket_all')
                @endforeach
                <div class="row">
                    <div>
                        {!!$tickets->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col-3">
                    <h3>Catalog to the FastTicket service</h3>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-4">
                    <p>Choose a ticket or use the catalog search</p>
                </div>
                <div class="col-8"><hr></div>
            </div>
            <div class="row mb-3">
                <div class="accordion" id="accordionPanelsStayOpenExample ">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Выберите необходимые параметры для поиска билета
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <form class="row g-3" method="GET" action="{{asset('tickets')}}">
                                    <label class="col-sm-3 col-form-label">Select a country</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="countries" name="country">
                                            <option selected>countries</option>
                                            @foreach($countries as $country)
                                            <option value={{$country->id}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Plase id (Город)</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Брянск">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Subcatalog id (подкатегория)</label>
                                <select id="inputState" class="form-select">
                                  <option selected>Выберите...</option>
                                  <option>...</option>
                                </select>
                            <div class="col-md-2">
                              <label for="inputZip" class="form-label">Event datetime</label>
                              <input type="date" class="form-control" id="inputZip">
                            </div>
                            <div class="col-md-12">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                  online
                                </label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary">Найти</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            Всего билетов <b><a href="#">{{App\Models\Ticket::count()}}</a></b>.<br/>
            @foreach ($tickets as $ticket)
            <div class="row">
                <div class="col-5">
                    <h6>{{$ticket->name}}</h6>
                    <div>{{$ticket->event_datetime}}</div>
                </div>
                <div class="col-5">
                    <div>{!!$ticket->body!!}</div>
                    <a href="{{asset('ticket/'.$ticket->id)}}">detailed</a>
                </div>
                <div class="col-2 d-flex justify-content-around">
                    @if(in_array($ticket->id, $favorite))
                    <a href="{{asset('ticket_favorite/'.$ticket->id.'/delete')}}"><i class="bi bi-heart-fill"></i></a>
                    @else
                    <a href="{{asset('ticket/'.$ticket->id.'/favorite')}}"><i class="bi bi-heart"></i></a>
                    @endif
                    <a href=""><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <hr>
            @endforeach
            <div>
                {!!$tickets->links()!!}
            </div>
        </div>
    </div> --}}
@endsection
