<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public function client()
    {
        return $this->hasMany('App\Clientes');
    }

    public function sale(){

        return $this->hasMany('App\Sale', 'cliente_id');
    }



}