@extends('layouts.base')
@section('content')
    <div>

        <h2>кабинет пользователя</h2>
        <h4>{{Auth::user()->name}}</a></h4>
        {{-- <form method="POST" action="{{asset('home')}}">
            @csrf
            <input type="text" name="name" placeholder="ФИО"/>
            <input type="submit" value="Сохранить">
        </form> --}}
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>body</th>
                <th>action</th>
            </tr>
        @foreach ($catalogs as $catalog)
        <tr>
            <td>{{$catalog->id}}</td>
            <td>{{$catalog->name}}</td>
            <td>{{$catalog->body}}</td>
            <td>
                <a href="{{asset('dashboard/catalog/'.$catalog->id.'/delete')}}">удалить</a>
                <a href="{{asset('dashboard/catalog/'.$catalog->id.'')}}">редактировать</a>
            </td>
        </tr>
        @endforeach
        </table>
    </div>
@endsection
