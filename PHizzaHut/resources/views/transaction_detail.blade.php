@extends('header')

@section('title', 'Transaction Details | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div style="margin-bottom: 20px">
        <h3>Transaction Detail</h3>
    </div>

    @if ($list_is_empty)
    <div class="card border-secondary mb-3" style="padding: 20px">
        <h5>No transaction detail..? :/</h5>
        <p style="margin: 0px">One or more items on this order might have been removed from our menus.</p>
    </div>
    @else
    @foreach ($list as $item)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <div class="row">
            <div class="col">
                <img src="/../storage/images/{{$item['pizza']->image}}" style="height: 100px; width: auto">
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
    @endif
</div>

@endsection
