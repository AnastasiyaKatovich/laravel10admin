@extends('layouts.base')
@section('content')
<div class="container overflow-hidden">
    <div class="container p-5">
        <div class="row">
            <div class="col-3">
                <h3>Feedback</h3>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-4">
                <p>If you have any questions or wishes regarding the operation of our service, please write to us.</p>
            </div>
            <div class="col-8"><hr></div>
        </div>
    </div>
</div>
@include('includes/email')
@endsection
