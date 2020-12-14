@extends('header')

@section('title', 'Transaction Detail | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div style="margin-bottom: 20px">
        <h3>Transaction Detail</h3>
    </div>

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
                    Quantity: {{$item['detail']->quantity}}<br>
                    Total Price: Rp. {{$item['total_price']}}
                </p>
            </div>
            <!-- I should really learn how to adjust these properly -->
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    @endforeach
</div>

@endsection
