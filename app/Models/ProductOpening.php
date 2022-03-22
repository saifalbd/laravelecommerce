<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOpening extends Model
{
    use HasFactory;

    protected $table = 'product_oppenings';
    protected $fillable = ['quantity','rate','warehouse_id'];

    public function getAmountAttribute()
    {
        return $this->quantity * $this->rate;
    }
}
