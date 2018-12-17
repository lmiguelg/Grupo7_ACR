<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    //
    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
    public function sale(){
        return $this->belongsTo('App\Sale', 'sale0_id', 'id');
    }
}
