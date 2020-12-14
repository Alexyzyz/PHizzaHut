<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pizza;

class HomeController extends Controller
{
    public function search(Request $request) {
        // searching an empty string gives you the entire menu again
        if ($request->search == '')
            $top_pizzas = Pizza::paginate(6);
        else
            $top_pizzas = Pizza::where('name', '=', $request->search)->paginate(6);
        $bottom_pizzas = $top_pizzas->splice(3);

        $top_is_empty = count($top_pizzas) == 0;
        $bottom_is_empty = count($bottom_pizzas) == 0;
        return view('home', compact('top_pizzas', 'bottom_pizzas', 'top_is_empty', 'bottom_is_empty'));
    }
}
