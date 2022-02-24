<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    use HasFactory;


    protected $fillable = ['quantity','rate','purchase_id','storage_id','product_id'];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getAmountAttribute()
    {
        return $this->quantity * $this->rate;
    }


}
