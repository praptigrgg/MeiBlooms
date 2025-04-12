<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'bouquet_id',
        'price',
        'quantity',
        'image',
    ];
    public function bouquet()
{
    return $this->belongsTo(Bouquet::class);
}

}

