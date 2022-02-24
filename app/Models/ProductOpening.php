<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOpening extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','rate'];

    public function getAmountAttribute()
    {
        return $this->quantity * $this->rate;
    }
}
