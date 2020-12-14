@extends('header')

@section('title', 'Delete Pizza | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div class="card" style="padding: 40px">
        <div class="row">
            <!-- Image on the left -->
            <div class="col" style="margin-right: 20px">
                <img src="/assets/{{$pizza->image}}" style="width: 100%; height: auto">
            </div>

            <!-- Everything else on the right -->
            <div class="col">
                <div style="margin-bottom: 20px">
                    <h3>Delete Existing Pizza?</h3>
                </div>

                <div>
                    <h4>{{$pizza->name}}</h4>
                    <p>{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>
                </div>
        
                <form method="POST" action="/pizza/{{$pizza->id}}/delete">
                    @method('delete')
                    @csrf
                    <div style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary btn-danger">
                            Delete Pizza
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
