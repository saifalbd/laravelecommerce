<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','rate','description','sku','vendor_id','opening_id','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function vendor(){
        return $this->belongsTo(User::class,'vendor_id');
    }

    public function opening(){
        return $this->belongsTo(ProductOpening::class,'opening_id');
    }


}
