@extends('header')

@section('title', 'Home | PHizza Hut')

@section('content')

<h3>Transaction List</h4>
<!-- List of users -->
<ul>
@foreach ($users as $user)
    <li>
        <h4>{{$user->username}}</h3>
        <!-- List of user orders -->
        <ul style="list-style-type: square;">
        @foreach ($user->transaction as $transaction)
            <li>
                <h5>{{$transaction->datetime}}</h4>
                <!-- List of order items -->
                <ol>
                @foreach ($transaction->transactiondetail as $item)
                    <li>
                        <h5>{{$item->pizza->name}}</h5>
                        <h6>Qty: {{$item->quantity}}</h6>
                        <p>{{$item->pizza->description}}</p>
                    </li>
                @endforeach
                </ol>
            </li>
        @endforeach
        </ul>
    </li>
@endforeach
</ul>

@endsection