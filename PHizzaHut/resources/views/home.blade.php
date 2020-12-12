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
        <div style="display: inline-block; margin-right: 10px">
            <label for="search">Search pizza:</label>
        </div>
        <div style="display: inline-block; width: 33%">
            <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Enter pizza name" autocomplete="search">
        </div>
        <div style="display: inline-block">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>

    <div>
        <!-- Two rows of pizzas -->
        <div class="row" style="margin-bottom: 20px">
            @foreach ($pizzas_top as $item)
            <div class="col">
                <div class="card" style="padding: 5%">
                    <h4>{{$item->name}}</h4>
                    <p>Pizza price goes here.</p>
                </div>
            </div>
            @endforeach
        </div>

        @if ($bottom_is_empty == false)
        <div class="row" style="margin-bottom: 20px">
            @foreach ($pizzas_bottom as $item)
            <div class="col">
                <div class="card" style="padding: 5%">
                    <h4>{{$item->name}}</h4>
                    <p>Pizza price goes here.</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{$pizzas_top->links()}}
    </div>

</div>

@endsection
