@extends('header')

@section('title', 'Pizza Detail | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div class="card" style="padding: 40px">
        <div class="row">
            <div class="col">
                <img src="/assets/{{$pizza->image}}" style="width: 100%; height: 100%">
            </div>
            <div class="col">
                <h3>{{$pizza->name}}</h3>
                <p>{{$pizza->description}}</p>
                <p><b>Rp. {{$pizza->price}}</b></p>
            </div>
        </div>
    </div>
</div>

@endsection
