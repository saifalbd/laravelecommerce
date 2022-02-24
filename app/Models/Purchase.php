<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['quantity','amount','seller_id'];


    public function products(){
        return $this->hasMany(OrderProduct::class);
    }

    public function seller(){
        return $this->belongsTo(User::class,'seller_id');
    }
}
