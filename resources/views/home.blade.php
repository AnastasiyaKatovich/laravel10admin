@extends('layouts.base')
@section('content')
    <div>
        <h2>кабинет пользователя</h2>
        <h4>{{Auth::user()->name}}</a></h4>
        <form method="POST" action="{{asset('home')}}">
            @csrf
            <input type="text" name="name" placeholder="ФИО"/>
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection
