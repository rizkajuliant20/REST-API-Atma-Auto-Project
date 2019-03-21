<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    protected $table="sparepart";
    protected $primaryKey="ID_SPAREPARTS";
    public $timestamps=true;
    protected $fillable=[
        'KODE_PENEMPATAN','NAMA_SPAREPART','HARGA_BELI','HARGA_JUAL','STOK_MINIMAL','STOK_BARANG','GAMBAR','TIPE'
    ];

    public function posisi()
    {
        return $this->belongsTo(posisi::class,'KODE_PENEMPATAN');
    }
    

    public function sparepart_motor()
    {
        return $this->hasMany(sparepart_motor::class,'ID_SPAREPARTS');
    }
    public function detail_penjualan_sparepart()
    {
        return $this->hasMany(detail_penjualan_sparepart::class,'ID_SPAREPARTS');
    }
    public function detail_pemesanan()
    {
        return $this->hasMany(detail_pemesanan::class,'ID_SPAREPARTS');
    }
}
