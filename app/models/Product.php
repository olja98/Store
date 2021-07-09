<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
    'product_name',
    'price',
    'slug',
    'status',
    'category_id',
    'product_description'


    ];

    public function category(){
        return $this->belongsTo('App\models\ProductCategory');
    }

    public function product_image(){
        return $this->hasOne('App\models\ProductImage');
    }
}
