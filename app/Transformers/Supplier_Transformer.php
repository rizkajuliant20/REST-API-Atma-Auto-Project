<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\supplier;
class Supplier_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param supplier $supplier
     */
    public function transform(supplier $supplier)
    {
        return [
            'ID_SUPPLIER' => $supplier->ID_SUPPLIER,
            'NAMA_SUPPLIER' => $supplier->NAMA_SUPPLIER,
            'ALAMAT_SUPPLIER' => $supplier->ALAMAT_SUPPLIER,
            'TELEPON_SUPPLIER' => $supplier->TELEPON_SUPPLIER,
            'NAMA_SALES' => $supplier->NAMA_SALES,
            'TELEPON_SALES' => $supplier->TELEPON_SALES,
            
           
            
        ];
    }
}