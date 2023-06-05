@extends('layouts.base')
@section('content')
    <div>
        <h2>Редактирование {{$catalog->name}}</h2>
        <form action="{{asset('dashboard/catalog/'.$catalog->id)}}" method="post">
            {{-- писать во всех формах --}}
            @csrf
            <input type="text" name="name" value="{{$catalog->name}}"/>
            <textarea name="body" id="body" cols="30" rows="10">{{$catalog->body}}</textarea>
            <button type="submit">сохранить</button>
        </form>

    </div>
@endsection
