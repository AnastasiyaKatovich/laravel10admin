@extends('layouts.base')
@section('content')
<div class="p-4">
    <h4 class="text-center">Add a ticket</h4>
    <div>
        @if (count($errors)>0)
        <div>Найдены следующие ошибки <br>
            @foreach ($errors->all() as $error )
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif

        {{-- <form method="post" action="{{asset('ticket')}}" enctype="multipart/form-data">
            @csrf
            <input class="form-control form-control" type="text" name="body" placeholder="name of your ticket"/><br/>
            <select name="catalog_id" class="form-select">
                <option selected>select a category</option>
                @foreach($catalogs as $catalog)
                <option value={{$catalog->id}}>{{$catalog->name}}</option>
                @endforeach
            </select><br/>
            <div class="mb-3">
                <input type="date" name="event_datetime">
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="picture"/>
            </div>

            <div class="mb-3">
                <input type="submit" value="save"/>
            </div>
        </form> --}}

        <form class="col-6 p-4" method="post" action="{{asset('ticket')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name of your ticket</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="body" placeholder="enter a name">
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
                <input type="date" class="form-control" name="event_datetime">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Select a category</label>
                <div class="col-sm-9">
                    <select name="catalog_id" class="form-select">
                        <option selected>categories</option>
                        @foreach($catalogs as $catalog)
                        <option value={{$catalog->id}}>{{$catalog->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="row mb-3">
                <label class="col-sm-3 col-form-label">More detailed</label>
                <div class="col-sm-9">
                <textarea class="form-control" placeholder="enter your text" id="" name="" type="" style="height: 100px"></textarea>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col orm-check">
                    <input class="form-check-input" type="checkbox" id="checkbox" name="online_try">
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
                        <option value={{$country->id}}>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Save"/>
        </form>
    </div>
</div>
@endsection
