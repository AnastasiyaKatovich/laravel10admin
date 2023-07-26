{{-- @extends('layouts.base')
@section('content') --}}
<div class="p-4">
    {{-- <h4 class="text-center">Add a ticket</h4> --}}
    <div>
        @if (count($errors)>0)
        <div>Найдены следующие ошибки <br>
            @foreach ($errors->all() as $error )
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <div class="row justify-content-center">
            <form class="col-6 p-4" method="post" action="{{asset((isset($href))?$href:'ticket')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name of your ticket</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{isset($ticket)?$ticket->name:''}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Fhoto of your ticket</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="picture"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Event date time</label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control" name="event_datetime" value="{{isset($ticket)?$ticket->event_datetime:''}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="catalog_id">Select a category</label>
                    <div  class="col-sm-9">
                        <select name="catalog_id" class="form-select" id="catalog_id">
                            <option selected>categories</option>
                            @foreach($catalogs as $catalog)

                            <option value={{$catalog->id}}
                                @if(isset($ticket))
                                @if($ticket->catalog_id==$catalog->id)
                                selected
                                @endif
                                @endif
                                >{{$catalog->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="subcatalog">Select subcategory</label>
                    <div class="col-sm-9">
                        <div id="subcatalog_empty"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">More detailed</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" id="" name="body" type="text" style="height: 100px">{{isset($ticket)?$ticket->body:''}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                    <div class="row">
                        <div class="col-10">
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="col-2">
                            <select id="" class="form-control" name="currency_id">
                                <option selected>currencies</option>
                            @foreach($currencies as $currency)
                            <option value={{$currency->id}}
                                @if(isset($ticket))
                                @if($ticket->currency_id==$currency->id)
                                selected
                                @endif
                                @endif
                                >{{$currency->name}}</option>
                            @endforeach
                              </select>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col orm-check">
                        <input class="form-check-input" type="checkbox" id="checkbox" name="online_try"
                        @if(isset($ticket))
                        @if($ticket->online > 0)
                        checked
                        @endif
                        @endif
                        >
                        <label class="form-check-label" for="gridCheck1" >
                            online event
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Select a country</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="countries" name="country_id">
                            <option selected>countries</option>
                            @foreach($countries as $country)
                            <option value={{$country->id}}
                                @if(isset($ticket))
                                @if($ticket->country_id==$country->id)
                                selected
                                @endif
                                @endif
                                >{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <input class="btn btn-primary col-sm-2" type="submit" value="Save"/>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @endsection --}}
