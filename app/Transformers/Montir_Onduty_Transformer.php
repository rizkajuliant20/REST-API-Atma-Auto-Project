<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\montir_onduty;
class Montir_Onduty_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param montir_onduty $montir_onduty
     */
    public function transform(montir_onduty $montir_onduty)
    {
        return [
            'ID_MONTIR_ONDUTY' => $montir_onduty->ID_MONTIR_ONDUTY,
            'ID_PEGAWAI' => $montir_onduty->ID_PEGAWAI,
            'ID_KENDARAAN_PEL' => $montir_onduty->ID_KENDARAAN_PEL,
           
            
        ];
    }
}