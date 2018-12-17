<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    public function clientes(){
        return $this->belongsTo('App\Clientes', 'cliente_id', 'id');
    }

    public function product(){


    }
}
