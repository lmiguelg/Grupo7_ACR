<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //
    public function fornecedors()
    {
        return $this->hasOne('App\Fornecedors');
    }

}
