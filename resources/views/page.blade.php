@extends('layouts.base')
@section('content')
    <div>
        <h2>{{$page->name}}</h2>
        <div>{!!$page->body!!}</div>
    </div>
@endsection
