<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'bouquet_id',
        'user_id',
        'rating',
        'comment',
    ];
    public function bouquet()
{
    return $this->belongsTo(Bouquet::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
