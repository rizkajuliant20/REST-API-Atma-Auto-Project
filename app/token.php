<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    protected $table = 'tokens';
    protected $primaryKey = 'ID_TOKEN';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'TOKEN_USERNAME',
        'TOKEN_PASSWORD',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(user::class,'id');
    }
}
