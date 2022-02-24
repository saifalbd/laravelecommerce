<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','amount','buyer_id','status','address'];


    public function products(){
        return $this->hasMany(OrderProduct::class);
    }

    public function buyer(){
        return $this->belongsTo(User::class,'buyer_id');
    }

}
