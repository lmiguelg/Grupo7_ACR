<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public function client()
    {
        return $this->hasMany('App\Clientes');
    }
}