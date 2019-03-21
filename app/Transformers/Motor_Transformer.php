<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\motor;
class Motor_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param motor $motor
     */
    public function transform(motor $motor)
    {
        return [
            'ID_MOTOR' => $motor->ID_MOTOR,
            'MERK_MOTOR' => $motor->MERK_MOTOR,
            'TIPE_MOTOR' => $motor->TIPE_MOTOR,
           
            
        ];
    }
}