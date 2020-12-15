@extends('header')

@section('title', 'Edit Pizza | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div class="card" style="padding: 40px">
        <div class="row">
            <!-- Image on the left -->
            <div class="col" style="margin-right: 20px">
                <img src="/../storage/images/{{$pizza->image}}" style="width: 100%; height: auto">
            </div>

            <!-- Everything else on the right -->
            <div class="col">
                <div style="margin-bottom: 20px">
                    <h3>Edit Existing Pizza</h3>
                </div>

                <div>
                    <h4>{{$pizza->name}}</h4>
                    <p>{{$pizza->description}}</p>
                    <p><b>Rp. {{$pizza->price}}</b></p>
                </div>
        
                <form method="POST" action="/pizza/{{$pizza->id}}/edit" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div>
                        <div>
                            <!-- Pizza name field -->
                            <div style="display: inline-block; width: 150px; margin-right: 20px">
                                <label for="name" class="col-form-label">Pizza name</label>
                            </div>
                            <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter the pizza's new name" required autofocus>
                            </div>
                            @error('name')
                            <div style="margin-bottom: 5px; color: #DC3545">* {{ $message }}</div>
                            @enderror
                        </div>
        
                        <div>
                            <!-- Pizza price field -->
                            <div style="display: inline-block; width: 150px; margin-top: 5px; margin-right: 20px">
                                <label for="price" class="col-form-label">Pizza price</label>
                            </div>
                            <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter the pizza's new price" required>
                            </div>
                            @error('price')
                            <div style="margin-bottom: 5px; color: #DC3545">* {{ $message }}</div>
                            @enderror
                        </div>
        
                        <div>
                            <!-- Pizza description field -->
                            <div style="display: inline-block; width: 150px; margin-top: 5px; margin-right: 20px">
                                <label for="description" class="col-form-label">Pizza description</label>
                            </div>
                            <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Enter the pizza's new description" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @error('description')
                            <div style="margin-bottom: 5px; color: #DC3545">* {{ $message }}</div>
                            @enderror
                        </div>
        
                        <div>
                            <!-- Pizza image field -->
                            <div class="input-group" style="margin-top: 5px">
                                <div style="display: inline-block; width: 150px; margin-top: 5px; margin-right: 20px">
                                    <label for="image" class="col-form-label">Pizza image</label>
                                </div>
                                <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                                    <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                                </div>
                            </div>
                        </div>
        
                        <div style="margin-top: 15px;">
                            <button type="submit" class="btn btn-primary">
                                Edit Pizza
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
