<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'                => $this->id,
            'name'              =>$this->name,
            'expiration_date'   =>$this->expiration_date,
            'quantity'          => $this->quantity,
            "price"             => $this->price,
            "fornecedor_id"     => $this->fornecedor_id,
        ];
    }
}
