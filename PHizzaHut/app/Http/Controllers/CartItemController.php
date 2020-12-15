<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartItem;
use App\Transaction;
use App\TransactionDetail;

use Auth;

class CartItemController extends Controller
{
    // insert the new cart item into the database
    public function insert_cart_item(Request $request) {
        $request->validate([
            'quantity' => 'numeric|min:1'
        ]);

        $cart_item = new CartItem();
        $cart_item->user_id = Auth::user()->id;
        $cart_item->pizza_id = $request->id;
        $cart_item->quantity = $request->quantity;

        $cart_item->save();

        return redirect('cart');
    }

    // edit the existing cart item in the database
    public function update_cart_item(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'numeric|min:1'
        ]);

        $cart_item = CartItem::find($id);
        $cart_item->quantity = $request->quantity;

        $cart_item->save();

        return redirect('cart');
    }

    // delete the existing cart item from the database
    public function delete_cart_item($id)
    {
        $cart_item = CartItem::find($id);
        $cart_item->delete();

        return redirect('cart');
    }

    // delete all existing cart items from the database
    public function delete_all_cart_items()
    {
        $cart_items = Auth::user()->cart_item()->get();

        // create the new transaction
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->datetime = now();

        $transaction->save();

        // create each transaction detail for the transaction
        foreach ($cart_items as $cart_item) {
            $transaction_detail = new TransactionDetail();
            $transaction_detail->transaction_id = $transaction->id;
            $transaction_detail->pizza_id = $cart_item->pizza_id;
            $transaction_detail->quantity = $cart_item->quantity;

            $transaction_detail->save();

            $cart_item->delete();
        }

        return redirect('cart');
    }
}
