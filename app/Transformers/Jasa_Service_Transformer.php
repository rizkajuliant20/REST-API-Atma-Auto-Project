<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\jasa_service;
class Jasa_Service_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param jasa_service $jasa_service
     */
    public function transform(jasa_service $jasa_service)
    {
        return [
            'ID_JASA' => $jasa_service->ID_JASA,
            'NAMA_JASA' => $jasa_service->NAMA_JASA,
            'HARGA_JASA' => $jasa_service->HARGA_JASA,
    
        ];
    }
}