<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\Pizza;
use App\Transaction;
use App\TransactionDetail;
use App\CartItem;

class PageController extends Controller
{
    // login
    public function login() {
        return view('auth/login');
    }

    // register
    public function register() {
        return view('auth/register');
    }

    // home
    public function home() {
        $top_pizzas = Pizza::paginate(6);
        $bottom_pizzas = $top_pizzas->splice(3);

        $top_is_empty = count($top_pizzas) == 0;
        $bottom_is_empty = count($bottom_pizzas) == 0;
        return view('home', compact('top_pizzas', 'bottom_pizzas', 'top_is_empty', 'bottom_is_empty'));
    }

    // pizza detail
    public function pizza_detail($id) {
        $pizza = Pizza::find($id);
        if ($pizza == null)
            return redirect('/home');
        return view('pizza_detail', compact('pizza'));
    }

    // cart
    public function cart() {
        if (Auth::user()->role != 'member')
            return redirect('/home');

        $carts = Auth::user()->cart_item()->get();

        $list = array();
        $list_is_empty = $carts->isEmpty();

        if ($list_is_empty)
            return view('cart', compact('list', 'list_is_empty'));

        foreach ($carts as $cart) {
            // i tried using $pizza = $cart->pizza()
            // but it just won't work and i'm too tired to care
            $pizza = Pizza::where('id', '=', $cart->pizza_id)->first();

            $total_price = $pizza->price * $cart->quantity;
            $item = [
                'cart' => $cart,
                'pizza' => $pizza,
                'total_price' => $total_price
            ];
            array_push($list, $item);
        }

        return view('cart', compact('list', 'list_is_empty'));
    }

    // transactions
    public function transactions() {
        $list = Auth::user()->transaction()->get();
        $list_is_empty = $list->isEmpty();
        return view('transactions', compact('list', 'list_is_empty'));
    }

    // users
    public function users() {
        $users = User::all();
        $users_is_empty = $users->isEmpty();
        return view('users', compact('users', 'users_is_empty'));
    }

    // all transactions
    public function all_transactions() {
        $transactions = Transaction::all();

        $list = array();
        foreach ($transactions as $trans) {
            $user = User::where('id', '=', $trans->user_id)->first();
            $item = [
                'trans' => $trans,
                'user' => $user
            ];
            array_push($list, $item);
        }

        $list_is_empty = count($list) == 0;

        return view('all_transactions', compact('list', 'list_is_empty'));
    }

    // add pizza
    public function add_pizza() {
        return view('add_pizza');
    }

    // edit pizza
    public function edit_pizza($id) {
        $pizza = Pizza::find($id);
        if ($pizza == null)
            return redirect('/home');
        return view('edit_pizza', compact('pizza'));
    }

    // delete pizza
    public function delete_pizza($id) {
        $pizza = Pizza::find($id);
        if ($pizza == null)
            return redirect('/home');
        return view('delete_pizza', compact('pizza'));
    }

    // transaction detail
    public function transaction_detail($id) {
        $transaction = Transaction::find($id);

        if (Auth::user()->role != 'admin' &&
            Auth::user()->id != $transaction->user_id)
            return redirect('/home');
        
        $details = $transaction->transaction_detail()->get();

        $list = array();
        foreach ($details as $detail) {
            // again, i have no idea why i have to do this
            // in order for this to work
            $pizza = Pizza::where('id', '=', $detail->pizza_id)->first();
            
            $total_price = $pizza->price * $detail->quantity;
            $item = [
                'detail' => $detail,
                'pizza' => $pizza,
                'total_price' => $total_price
            ];
            array_push($list, $item);
        }

        return view('transaction_detail', compact('list'));
    }
}
