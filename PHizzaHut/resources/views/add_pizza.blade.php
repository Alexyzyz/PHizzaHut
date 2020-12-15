@extends('header')

@section('title', 'Add Pizza | PHizza Hut')

@section('content')

<div style="margin: 3%">
    <div class="card" style="padding: 40px">
        <div style="margin-bottom: 20px">
            <h3>Add New Pizza</h3>
        </div>

        <form method="POST" action="/pizza/add" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <!-- Pizza name field -->
                    <div style="display: inline-block; width: 150px; margin-right: 20px">
                        <label for="name" class="col-form-label">Pizza name</label>
                    </div>
                    <div style="display: inline-block; width: 500px; margin-bottom: 5px">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter the new pizza's name" required autofocus>
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
                        <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter the new pizza's price" required>
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
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Enter the new pizza's description" required>
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
                    <div style="margin-top: 20px; margin-right: 20px">
                        <h6>Upload the pizza's image below</h6>
                    </div>
                    <div style="margin-top: 20px;">
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">
                        Add Pizza
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
