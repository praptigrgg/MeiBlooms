<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }


protected $fillable = [
    'name',
    'type',
    'description',
    'price',
    'discount_price',
    'image',
    'category_id',
];

}
