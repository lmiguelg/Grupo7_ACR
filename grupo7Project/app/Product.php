<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //
    public function fornecedors()
    {
        return $this->belongsTo('App\Fornecedors', 'fornecedor_id', 'id');
    }

    // public function sale(){

    //     return $this->belongsToMany ('App\SaleItem');
    // }

}
