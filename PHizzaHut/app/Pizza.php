<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //

    public function transaction_detail() {
        return $this->belongsTo(TransactionDetail::class, 'id');
    }
}
