<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function transaction_detail() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
