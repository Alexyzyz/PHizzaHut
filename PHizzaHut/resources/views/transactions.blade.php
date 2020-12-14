@extends('header')

@section('title', 'Transaction History | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div style="margin-bottom: 20px">
        <h3>My Transactions</h3>
    </div>

    @if ($list_is_empty)
    <div class="card border-secondary mb-3" style="padding: 20px">
        <h5>No transactions so far :(</h5>
        <p style="margin: 0px">Hey, hey. Why don't you start by ordering our best-sellers? :D</p>
    </div>
    @else
    @foreach ($list as $item)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <h6 style="margin: 0px"><a href="/transactions/{{$item->id}}" style="color: black">Transaction at {{$item->datetime}}</a></h6>
    </div>
    @endforeach
    @endif
</div>

@endsection
