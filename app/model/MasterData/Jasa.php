<?php

namespace App\model\MAsterData;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    //
    protected $table = 'jasa';
    protected $fillable = ['kode', 
    'nama_jasa',
    'jasakatagori_id',
    'harga_jual',
    'fee_dokter',
    'fee_asisten',
    'fee_staff',
    'keterangan', 
    'aktif',
    'create_at', 
    'update_at'];

    protected $with = ['jasakatagori'];
    public function jasakatagori()
    {
        return $this->belongsTo('App\model\MasterData\Jasakatagori','jasakatagori_id');
    }
}
