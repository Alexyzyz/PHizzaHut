@extends('header')

@section('title', 'Home | PHizza Hut')

@section('content')

<div style="margin: 3%">

    <div style="margin-bottom: 15px">
        <h3 style="margin-bottom: 0px">Our freshly made pizza!</h3>
        <h4 style="color: #808080">order now!</h4>
    </div>

    <div style="margin-bottom: 20px">
        <!-- Is this how you put elements side by side properly? I forgot. -->
        <!-- I hate how this looks -->
        <form method="POST" action="{{ url('home') }}">
            @csrf
            <div style="display: inline-block; margin-right: 10px">
                <label for="search">Search pizza:</label>
            </div>
            <div style="display: inline-block; width: 33%">
                <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Enter pizza name" autocomplete="search">
            </div>
            <div style="display: inline-block">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <div>
        <!-- Two rows of pizzas -->
        @if ($top_is_empty == false)
        <div class="row" style="margin-bottom: 20px">
            @foreach ($top_pizzas as $pizza)
            <div class="col">
                <div class="card border-secondary mb-3" style="padding: 20px">
                    <img src="/assets/{{$pizza->image}}" style="width: 200px; height: 200px; margin-bottom: 10px">
                    <h4><a href="{{url('pizza-detail/'.$pizza->id)}}" style="color: black">{{$pizza->name}}</a></h4>
                    <p style="height: 100px">{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if ($bottom_is_empty == false)
        <div class="row" style="margin-bottom: 20px">
            @foreach ($bottom_pizzas as $pizza)
            <div class="col">
                <div class="card border-secondary mb-3" style="padding: 20px">
                    <img src="/assets/{{$pizza->image}}" style="width: 200px; height: 200px; margin-bottom: 10px">
                    <h4><a href="{{url('pizza-detail/'.$pizza->id)}}" style="color: black">{{$pizza->name}}</a></h4>
                    <p style="height: 100px">{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{$top_pizzas->links()}}
    </div>

</div>

@endsection
