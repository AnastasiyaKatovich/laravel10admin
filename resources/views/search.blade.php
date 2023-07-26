@extends('layouts.base')
@section('content')
    <div class="container overflow-hidden">
        <div class="container p-5">
            <div class="row">
                <div class="col">
                    <h5>
                        By result "{{$search}}"
                    </h5>
                </div>
            </div>
            <div class="row">
                @if (!$ticket_results->first())
                    <div>Nothing found</div>
                    {{-- дополните данные --}}
                    {{-- @include('include.........') --}}
                    @else
                        @foreach ($ticket_results as $ticket)
                            @include('includes.ticket_card')
                        @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
