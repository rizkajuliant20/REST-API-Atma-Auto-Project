<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    protected $table="posisi";
    protected $primaryKey="KODE_PENEMPATAN";
    public $timestamps=true;
    protected $fillable=['KETERANGAN'];

    public $incrementing = false;

    public function sparepart()
    {
        
        return $this->hasMany(sparepart::class, 'KODE_PENEMPATAN');
    }
}
