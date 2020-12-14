<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id', 'pizza_id', 'quantity',
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function pizza() {
        return $this->hasOne(Pizza::class, 'id');
    }
}
