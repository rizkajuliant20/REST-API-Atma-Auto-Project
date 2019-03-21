<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan_sparepart extends Model
{
    protected $table="pemesanan_sparepart";
    protected $primaryKey="ID_PEMESANAN";
    public $timestamps=true;
    protected $fillable=[
        'ID_SUPPLIER','TGL_PEMESANAN','GRANDTOTAL_PEMESANAN','STATUS_PEMESANAN'
    ];

    public function detail_pemesanan()
    {
        return $this->hasMany(detail_pemesanan::class,'ID_PEMESANAN');
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class,'ID_SUPPLIER');
    }
}
