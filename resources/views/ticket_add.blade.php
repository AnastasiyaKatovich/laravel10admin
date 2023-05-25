@extends('layouts.base')
@section('content')
    <div>
        <h2>Add a ticket</h2>
        <div>

@if (count($errors)>0)
    <div>Найдены следующие ошибки <br>
        @foreach ($errors->all() as $error )
         <div>{{$error}}</div>
        @endforeach
    </div>
@endif




            <form method="post" action="{{asset('ticket')}}" enctype="multipart/form-data">
                @csrf
<input type="text" name="body" placeholder="Ticket name"/><br />
<select name="catalog_id">
    @foreach($catalogs as $catalog)
     <option value={{$catalog->id}}>{{$catalog->name}}</option>
    @endforeach
</select><br />
<input type="date" name="event_datetime"><br />
<input type="file" name="picture" /> <br />
<input type="submit" value="save" />
            </form>
        </div>
    </div>
@endsection
