<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 10/11/2018
 * Time: 18:57
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Fornecedor extends Model

{

    public function fornecedor(){

        return $this->hasMany('App\Fornecedor');
    }

}