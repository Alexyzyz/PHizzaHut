<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pizza;
use App\Transaction;

class PageController extends Controller
{
    public function login() {
        return view('auth/login');
    }

    public function register() {
        return view('auth/register');
    }

    public function home() {
        $top_pizzas = Pizza::paginate(6);
        $bottom_pizzas = $top_pizzas->splice(3);

        $top_is_empty = count($top_pizzas) == 0;
        $bottom_is_empty = count($bottom_pizzas) == 0;
        return view('home', compact('top_pizzas', 'bottom_pizzas', 'top_is_empty', 'bottom_is_empty'));
    }

    public function search_home(Request $request) {
        if ($request->search == '')
            $top_pizzas = Pizza::paginate(6);
        else
            $top_pizzas = Pizza::where('name', '=', $request->search)->paginate(6);
        $bottom_pizzas = $top_pizzas->splice(3);

        $top_is_empty = count($top_pizzas) == 0;
        $bottom_is_empty = count($bottom_pizzas) == 0;
        return view('home', compact('top_pizzas', 'bottom_pizzas', 'top_is_empty', 'bottom_is_empty'));
    }

    public function pizza_detail($id) {
        $pizza = Pizza::find($id);
        return view('pizza_detail', compact('pizza'));
    }

    public function users() {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function all_transactions() {
        $transactions = Transaction::all();

        $data = array();
        foreach ($transactions as $trans) {
            $user = User::where('id', '=', $trans->user_id)->first();
            $item = [
                'trans' => $trans,
                'username' => $user->username
            ];
            array_push($data, $item);
        }

        return view('all_transactions', compact('data'));
    }
}
