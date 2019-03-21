<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\pegawai_onduty;
class Pegawai_Onduty_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param pegawai_onduty $pegawai_onduty
     */
    public function transform(pegawai_onduty $pegawai_onduty)
    {
        return [
            'ID_PEGAWAI_ONDUTY' => $pegawai_onduty->ID_PEGAWAI_ONDUTY,
            'ID_TRANSAKSI' => $pegawai_onduty->ID_TRANSAKSI,
            'ID_PEGAWAI' => $pegawai_onduty->ID_PEGAWAI,
           
            
        ];
    }
}