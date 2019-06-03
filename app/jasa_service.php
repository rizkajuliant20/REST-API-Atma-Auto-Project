<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jasa_service extends Model
{
    protected $table="jasa_service";
    protected $primaryKey="ID_JASA";
    public $incrementing =false;
    public $timestamps=true;
    protected $fillable=[
        'NAMA_JASA','HARGA_JASA',
    ];
    public function detail_penjualan_jasa()
    {
        return $this->hasMany(detail_penjualan_jasa::class, 'ID_JASA');
    }

}
