@extends('layouts.welcome')
@section('content')
    
<div class="container">
    
        <div class="row">
            <div class="col-12">
                <form action="{{route('get-price')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="departure">Departure</label>
                        <select class="form-control" name="departure" id="departure">
                            @foreach ($airports as $airport)
                           <option value="{{$airport->code}}">{{$airport->name}}</option>
                           
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="arrival">Arrival</label>
                       <select class="form-control" name="arrival" id="arrival">
                           @foreach ($airports as $airport)
                           <option value="{{$airport->code}}">{{$airport->name}}</option>
                               
                           @endforeach
                        </select>
                    </div>
                    <input class="btn btn-success" type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection