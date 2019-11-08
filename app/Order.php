<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];
    
    public function order_items(){
        return $this->hasMany('App\Order_items');
    }
}

// Order   OrderItem Book

// Order -> Book
// belongsTo hasMany


// Order   ->  OrderItem
// hasMany     belongsTo

// OrderItem   -> Book
// belongsTo       hasMany
