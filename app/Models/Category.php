<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','parent_id','is_active','image_id'];



    public function subCategories(){
        return $this->hasMany(static::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }



}
