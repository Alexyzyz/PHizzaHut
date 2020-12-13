@extends('header')

@section('title', 'Users | PHizza Hut')

@section('content')

<div style="margin: 3%">

    <div style="margin-bottom: 20px">
        <h3>Registered Users</h3>
    </div>

    @foreach ($users as $user)
    <div class="card border-secondary mb-3" style="padding: 20px; margin-bottom: 20px">
        <h6>User ID {{$user->id}}</h6>
        <div class="row">
            <div class="col">
                <p style="margin: 0px">
                    Username:<br>
                    Email:<br>
                    Address:<br>
                    Phone:<br>
                    Gender:<br>
                </p>
            </div>
            <div class="col">
                <p style="margin: 0px">
                    {{$user->username}}<br>
                    {{$user->email}}<br>
                    {{$user->address}}<br>
                    {{$user->phone}}<br>
                    {{$user->gender}}<br>
                </p>
            </div>

            <!-- Dummy columns to adjust the spacing -->
            <!-- Yes, I know this isn't optimal. I just don't care anymore -->
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    @endforeach

</div>

@endsection