@extends('layouts.base')
@section('content')
    <div class="text-center p-4">
        <h4 class="py-3">{{$page->name}}</h4>
        <div>{!!$page->body!!}</div>
    </div>
@endsection
