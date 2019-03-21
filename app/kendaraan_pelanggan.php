<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan_pelanggan extends Model
{
    protected $table="kendaraan_pelanggan";
    protected $primaryKey="ID_KENDARAAN_PEL";
    public $timestamps=true;
    protected $fillable=[
        'ID_MOTOR','ID_PELANGGAN','NO_PLAT'
    ];

    public function montir_onduty()
    {
        return $this->hasMany(montir_onduty::class,'ID_KENDARAAN_PEL');
    }

    public function motor()
    {
        return $this->belongsTo(motor::class,'ID_MOTOR');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class,'ID_PELANGGAN');
    }

    
}
