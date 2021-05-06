@extends('layouts.welcome')
@section('results')
    
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    <h1>Your Ticket</h1>
                </div>
                <span class="text-muted">From:</span>     <h3>{{$ticket['departure']}} - {{$ticket['code_departure']}}</h3>
                <span class="text-muted">to:</span>   <h3>{{$ticket['arrival']}} - {{$ticket['code_arrival']}} </h3>
                
                @if ($ticket['stopover'])
                <span class="text-muted">Stopover</span>   <h3>{{$ticket['stopover']}}</h3>
                
                @endif
                <span class="text-muted">Total</span>  <h3>{{$ticket['price'] / 100}} $</h3>
            </div>
        </div>
    </div>
</div>
@endsection