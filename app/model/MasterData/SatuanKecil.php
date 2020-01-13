<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class SatuanKecil extends Model
{
    //

    protected $table = "satuan_kecil";

    protected $fillable = ['id',
    'nama_satuan_kecil',
    'keterangan',
    'aktif'];

    protected $with = ['produk_item'];

    public function produk_item()
    {
            return $this->belongsTo('App\model\MasterData\produkitem', 'satuan_kecil_id');
    }
}
