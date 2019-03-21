<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sparepart_motor extends Model
{
    protected $table="sparepart_motor";
    protected $primaryKey="ID_SPAREPART_MOTOR";
    public $timestamps=true;
    protected $fillable=[
        'ID_SPAREPARTS','ID_MOTOR'
    ];

    public function sparepart()
    {
        return $this->belongsTo(sparepart::class,'ID_SPAREPARTS');
    }

    public function motor()
    {
        return $this->belongsTo(motor::class,'ID_MOTOR');
    }
    
}
