<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pizza;

class PizzaController extends Controller
{
    // insert the new pizza into the database
    public function insert_pizza(Request $request) {
        $request->validate([
            'name'          => 'required|string|min:20',
            'price'         => 'required|numeric|min:10000',
            'description'   => 'required|string|min:20'
            // uhh idk how to insert images yet
        ]);

        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->description = $request->description;
        $pizza->image = $request->image;

        $pizza->save();

        return redirect('home');
    }

    // edit the existing pizza in the database
    public function update_pizza(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|min:20',
            'price'         => 'required|numeric|min:10000',
            'description'   => 'required|string|min:20'
            // uhh idk how to insert images yet
        ]);

        $pizza = Pizza::find($id);
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->description = $request->description;
        $pizza->image = $request->image;

        $pizza->save();

        return redirect('home');
    }

    // delete the existing pizza from the database
    public function delete_pizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        return redirect('home');
    }
}
