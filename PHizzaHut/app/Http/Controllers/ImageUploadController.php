<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function storeStationary(Request $request) {
        $this->validate($request, [
            'type_id' => ['required'],
            'name' => ['filled', 'unique:stationaries,name', 'min:5'],
            'stock' => ['filled', 'numeric', 'min:1'],
            'price' => ['filled', 'numeric', 'min:5000'],
            'description' => ['filled', 'string', 'min:10'],
            'image' => ['filled'],
        ]);

        // Checking if image field is filled and contains image file
        if($request->hasFile('image')){

            $image = $request->file('image');

            // Storing new image file in storage folder
            Storage::putFileAs('public/images', $image, $image->getClientOriginalName());

            // Storing data to database (stationary table)
            $stationary = new Stationary();
            $stationary->type_id = $request->type_id;
            $stationary->name = $request->name;
            $stationary->stock = $request->stock;
            $stationary->price = $request->price;
            $stationary->description = $request->description;
            $stationary->image = $image->getClientOriginalName();
            $stationary->save();

            return back()->with('success', 'Stationary Added Successfully');

        }
        
    }
}
