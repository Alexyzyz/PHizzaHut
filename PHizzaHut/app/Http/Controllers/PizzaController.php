<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pizza;

use Storage;

class PizzaController extends Controller
{
    // insert the new pizza into the database
    public function insert_pizza(Request $request) {
        $request->validate([
            'name'          => 'required|string|min:20',
            'price'         => 'required|numeric|min:10000',
            'description'   => 'required|string|min:20',
            'image'         => 'filled'
        ]);

        if($request->hasFile('image')) {
            // deal with the image
            $pizza = new Pizza();
            $pizza->name = $request->name;
            $pizza->price = $request->price;
            $pizza->description = $request->description;
            $pizza->image = '';
            $pizza->save();

            $pizza->image = 'pizza_' . $pizza->id . '.png';
            $pizza->save();

            $image = $request->file('image');
            Storage::putFileAs('public/images', $image, $pizza->image);

            return redirect('home');
        }
        return back();
    }

    // edit the existing pizza in the database
    public function update_pizza(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|min:20',
            'price'         => 'required|numeric|min:10000',
            'description'   => 'required|string|min:20',
            'image'         => 'filled'
        ]);

        if($request->hasFile('image')) {
            // deal with the image
            $pizza = Pizza::find($id);
            $pizza->name = $request->name;
            $pizza->price = $request->price;
            $pizza->description = $request->description;
            $pizza->image = '';
            $pizza->save();

            $pizza->image = 'pizza_' . $pizza->id . '.png';
            $pizza->save();

            $image = $request->file('image');
            Storage::putFileAs('public/images', $image, $pizza->image);

            return redirect('home');
        }
        return back();
    }

    // delete the existing pizza from the database
    public function delete_pizza($id)
    {
        $pizza = Pizza::find($id);

        if (is_file(storage_path() . '/app/public/images/' . $pizza->image)) {
            unlink(storage_path() . '/app/public/images/' . $pizza->image);
        }
        
        $pizza->delete();

        return redirect('home');
    }
}
