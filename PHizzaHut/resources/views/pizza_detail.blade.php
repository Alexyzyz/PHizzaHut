@extends('header')

@section('title', 'Pizza Detail | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div class="card" style="padding: 40px">
        <div class="row">
            <div class="col" style="margin-right: 20px">
                <img src="/assets/{{$pizza->image}}" style="width: 100%; height: auto">
            </div>

            <div class="col">
                <h3>{{$pizza->name}}</h3>
                <p>{{$pizza->description}}</p>
                <p><b>Rp. {{$pizza->price}}</b></p>

                @if (Auth::user()->role == 'member')
                <form method="POST" action="/pizza/{{$pizza->id}}/add">
                    @csrf
                    <div>
                        <!-- Pizza quantity field -->
                        <div style="display: inline-block; width: 150px; margin-top: 5px; margin-right: 20px">
                            <label for="price" class="col-form-label">Quantity</label>
                        </div>
                        <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="Enter your desired quantity" required autofocus>
                        </div>
                        @error('quantity')
                        <div style="margin-bottom: 5px; color: #DC3545">* {{ $message }}</div>
                        @enderror
                    </div>
    
                    <div style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary">
                            Add to Cart
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
