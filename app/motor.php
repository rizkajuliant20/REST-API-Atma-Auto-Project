<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motor extends Model
{
    protected $table="motor";
    protected $primaryKey="ID_MOTOR";
    public $timestamps=true;
    protected $fillable=[
        'MERK_MOTOR','TIPE_MOTOR'
    ];

    public function kendaraan_pelanggan()
    {
        return $this->hasMany(kendaraan_pelanggan::class, 'ID_MOTOR');
    }
    public function sparepart_motor()
    {
        return $this->hasMany(sparepart_motor::class, 'ID_MOTOR');
    }
}



