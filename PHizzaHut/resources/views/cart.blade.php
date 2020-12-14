@extends('header')

@section('title', 'Cart | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div style="margin-bottom: 20px">
        <h3>My Cart</h3>
    </div>

    @if ($list_is_empty)
    <div class="card border-secondary mb-3" style="padding: 20px">
        <h5>Your cart is currently empty :O</h5>
        <p style="margin: 0px">Feeling hungry? Order our pizzas right away!</p>
    </div>
    @else
    @foreach ($list as $item)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <div class="row">
            <div class="col">
                <img src="/assets/{{$item['pizza']->image}}" style="height: 100px; width: auto">
            </div>
            <div class="col">
                <h6>{{$item['pizza']->name}}</h6>
                <p style="margin: 0px">
                    Rp. {{$item['pizza']->price}}<br>
                    Quantity: {{$item['cart']->quantity}}<br>
                    Total Price: Rp. {{$item['total_price']}}
                </p>

                <form method="POST" action="/cart/update/{{$item['cart']->id}}">
                    @method('patch')
                    @csrf
                    <div>
                        <!-- Pizza quantity field -->
                        <div style="display: inline-block; width: 150px; margin-top: 5px; margin-right: 20px">
                            <label for="price" class="col-form-label"><b>New quantity</b></label>
                        </div>
                        <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="Re-enter your desired quantity" required>
                        </div>
                        @error('quantity')
                        <div style="margin-bottom: 5px; color: #DC3545">* {{ $message }}</div>
                        @enderror
                        <div style="margin-top: 15px;">
                            <button href="" type="submit" class="btn btn-primary">Update Quantity</button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="/cart/delete/{{$item['cart']->id}}">
                    @method('delete')
                    @csrf
                    <div style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary btn-danger">
                            Delete from Cart
                        </button>
                    </div>
                </form>
            </div>
            <!-- I should really learn how to adjust these properly -->
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    @endforeach
    @endif

    @if ($list_is_empty == false)
    <form method="POST" action="/cart/delete/all">
        @method('delete')
        @csrf
        <div style="margin-top: 15px;">
            <center><button class="btn btn-primary btn-dark">Checkout</button></center>
        </div>
    </form>
    @endif
</div>

@endsection
