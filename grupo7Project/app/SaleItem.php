<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function saleItem(){
        return $this->hasMany('App\SaleItem');
    }
}
