<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class CustomerDetail extends Model
{
    use  Billable;

    protected $fillable=[
        'f_name',
        'l_name',
        'company_name',
        'phone',
        'email',
        'country',
        'address1',
        'address2',
        'town',
        'district',
        'post_code',
        'other_notes'
    ];

    
public function payments(){
    return $this->hasMany('App\models\Payment');
}

}
