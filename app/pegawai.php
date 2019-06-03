<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table="pegawai";
    protected $primaryKey="ID_PEGAWAI";
    public $incrementing =false;
    public $timestamps=true;
    protected $fillable=[
        'NAMA_PEGAWAI',
        'ALAMAT_PEGAWAI',
        'TELEPON_PEGAWAI',
        'GAJI_PEGAWAI',
        'id',
        'ID_CABANG',
        'ROLE'
    ];


    public function branches()
    {
        return $this->belongsTo(branches::class,'ID_CABANG');
    }

    public function montir_onduty()
    {
        return $this->hasMany(montir_onduty::class,'ID_PEGAWAI');
    }
    public function pegawai_onduty()
    {
        return $this->hasMany(pegawai_onduty::class,'ID_PEGAWAI');
    }

    public function users(){
        return $this->belongsTo(user::class,'id');
    } 

}
