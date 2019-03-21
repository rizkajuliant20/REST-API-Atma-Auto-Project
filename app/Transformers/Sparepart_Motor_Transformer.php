<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\sparepart_motor;
class Sparepart_Motor_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param sparepart_motor $sparepart_motor
     */
    public function transform(sparepart_motor $sparepart_motor)
    {
        return [
            'ID_SPAREPART_MOTOR' => $sparepart_motor->ID_SPAREPART_MOTOR,
            'ID_SPAREPARTS' => $sparepart_motor->ID_SPAREPARTS,
            'ID_MOTOR' => $sparepart_motor->ID_MOTOR,
           
            
        ];
    }
}