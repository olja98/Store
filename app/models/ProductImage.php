<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable=[
        'image_title',
        'image',
        'slug',
        'status',
        'product_id'
        ];


        public function product(){
            return $this->belongsTo('App\models\Product');
        }
}
