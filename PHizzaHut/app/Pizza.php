<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;

    public function cart_item() {
        return $this->belongsTo(CartItem::class, 'id');
    }

    public function transaction_detail() {
        return $this->belongsTo(TransactionDetail::class, 'id');
    }
}
