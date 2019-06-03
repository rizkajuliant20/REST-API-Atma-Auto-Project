<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'username','password',
    ];

    protected $hidden = [
        'password'
    ];

    public function tokens()
    {
        return $this->hasMany(token::class,'id');
    }

    public function pegawai(){
        return $this->hasOne(pegawai::class,'id');
    }

}
