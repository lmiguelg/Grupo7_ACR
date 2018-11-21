<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Fornecedor extends Model

{

    public function fornecedor(){

        return $this->hasMany('App\Fornecedor');
    }

}