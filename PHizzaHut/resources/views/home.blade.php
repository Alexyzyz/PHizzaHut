@extends('header')

@section('title', 'Home | PHizza Hut')

@section('content')

<div style="margin: 3%">

    <div>
        <h3 style="margin-bottom: 0px">Our freshly made pizza!</h3>
        <h4 style="color: #808080; margin-bottom: 15px">order now!</h4>
    </div>

    <div>
        <!-- Is this how you put elements side by side properly? I forgot. -->
        <!-- I hate how this looks -->
        <form method="POST" action="/home">
            @csrf
            <div style="margin-bottom: 10px">
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
        </form>

        @auth
        @if (Auth::user()->role == 'admin')
        <div style="margin-bottom: 10px">
            <a href="pizza/add" class="btn btn-primary btn-dark">Add Pizza</a>
        </div>
        @endif
        @endauth
    </div>

    <div>
        <!-- Two rows of pizzas -->
        @if ($top_is_empty)
        <div class="card border-secondary mb-3" style="padding: 20px">
            <h5>Pizza not found :(</h5>
            <p style="margin: 0px">That pizza doesn't exist in our menu, yet. Please stay tuned for new dishes!</p>
        </div>
        @else
        <div class="row" style="margin-bottom: 20px">
            @foreach ($top_pizzas as $pizza)
            <div class="col">

                <!-- Pizza info -->
                <div class="card border-secondary mb-3" style="padding: 20px">
                    <img src="/../storage/images/{{$pizza->image}}" style="width: 200px; height: 200px; margin-bottom: 10px">
                    <h4>
                        <a href="pizza/{{$pizza->id}}" style="color: black">
                            {{$pizza->name}}
                        </a>
                    </h4>
                    <p style="height: 100px">{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>

                    <!-- Admin only -->
                    @auth
                    @if (Auth::user()->role == 'admin')
                        <div>
                            <a href="pizza/{{$pizza->id}}/edit" class="btn btn-primary" style="display: inline-block">Edit Pizza</a>
                            <a href="pizza/{{$pizza->id}}/delete" class="btn btn-primary btn-danger" style="display: inline-block">Delete Pizza</a>
                        </div>
                    @endif
                    @endauth
                </div>

            </div>
            @endforeach
        </div>
        @endif

        @if ($bottom_is_empty == false)
        <div class="row" style="margin-bottom: 20px">
            @foreach ($bottom_pizzas as $pizza)
            <div class="col">

                <!-- Pizza info -->
                <div class="card border-secondary mb-3" style="padding: 20px">
                    <img src="/../storage/images/{{$pizza->image}}" style="width: 200px; height: 200px; margin-bottom: 10px">
                    <h4>
                        <a href="pizza/{{$pizza->id}}" style="color: black">
                            {{$pizza->name}}
                        </a>
                    </h4>
                    <p style="height: 100px">{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>

                    <!-- Admin only -->
                    @auth
                    @if (Auth::user()->role == 'admin')
                        <div>
                            <a href="pizza/{{$pizza->id}}/edit" class="btn btn-primary" style="display: inline-block">Edit Pizza</a>
                            <a href="pizza/{{$pizza->id}}/delete" class="btn btn-primary btn-danger" style="display: inline-block">Delete Pizza</a>
                        </div>
                    @endif
                    @endauth
                </div>

            </div>
            @endforeach
        </div>
        @endif

        {{$top_pizzas->links()}}
    </div>

</div>

@endsection
