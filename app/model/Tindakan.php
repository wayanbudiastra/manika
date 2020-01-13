<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    //
    protected $table = 'tindakan';
    protected $fillable = ['kode', 
    'nm_tindakan',
    'katagoritindakan_id',
    'tarif',
    'feedokter',
    'feenurse',
    'keterangan',
    'aktif', 
    'create_at', 
    'update_at'];

    public function katagoritindakan()
    {
        return $this->belongsTo('App\model\Katagoritindakan');
    }

}
