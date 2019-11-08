<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    public function book(){
        return $this->belongsTo('App\Book');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
