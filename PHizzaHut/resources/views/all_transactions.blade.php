@extends('header')

@section('title', 'Transaction History | PHizza Hut')

@section('content')

<div style="margin: 3%">

    <div style="margin-bottom: 20px">
        <h3>All Users' Transactions</h3>
    </div>

    @foreach ($data as $item)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <h6>Transaction at {{$item['trans']->datetime}}</h6>
        <p style="margin: 0px">
            User ID: {{$item['trans']->user_id}}<br>
            Username: {{$item['username']}}
        </p>
    </div>
    @endforeach

</div>

@endsection