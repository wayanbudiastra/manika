<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Katagoritindakan extends Model
{
    //
    protected $table = 'katagoritindakan';
    protected $fillable = ['nm_katagoritindakan','create_at', 'update_at'];

    public function tindakan()
    {
        return $this->hasMany('App\model\Tindakan');
    }
}
