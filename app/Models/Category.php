<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function bouquets() {
        return $this->hasMany(Bouquet::class);
    }

}
