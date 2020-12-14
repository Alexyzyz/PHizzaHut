@extends('header')

@section('title', 'All Transactions | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div style="margin-bottom: 20px">
        <h3>Completed Transactions</h3>
    </div>
    
    @if ($list_is_empty)
    <div class="card border-secondary mb-3" style="padding: 20px">
        <h5>No transactions so far :(</h5>
        <p style="margin: 0px">Wow! No transactions whatsoever? This business is sinking! Hahaha!</p>
    </div>
    @else
    @foreach ($list as $item)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <h6><a href="/transactions/{{$item['trans']->id}}" style="color: black">Transaction at {{$item['trans']->datetime}}</a></h6>
        <p style="margin: 0px">
            User ID: {{$item['trans']->user_id}}<br>
            Username: {{$item['user']->username}}
        </p>
    </div>
    @endforeach
    @endif
</div>

@endsection