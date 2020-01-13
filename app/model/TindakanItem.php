<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TindakanItem extends Model
{
    //
    protected $table = 'tindakan_item';
    protected $fillable = ['kode', 
    'nama_tindakan',
    'katagori_tindakan_id',
    'harga_jual',
    'fee_dokter',
    'fee_asisten',
    'fee_staff',
    'keterangan', 
    'aktif',
    'create_at', 
    'update_at'];

    protected $with = ['tindakan_kategori'];
    public function tindakan_kategori()
    {
        return $this->belongsTo('App\model\TindakanKategori','katagori_tindakan_id');
    }

}
