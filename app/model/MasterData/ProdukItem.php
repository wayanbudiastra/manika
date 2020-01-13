<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class ProdukItem extends Model
{
    //

    protected $table="produk_item";

    protected $fillable=['id',
    'kode',
    'nama_item',
    'katagori_item_id',
    'satuan_besar_id',
    'satuan_kecil_id',
    'isi_satuan',
    'harga_beli',
    'harga_jual',
    'fee_dokter',
    'fee_asisten',
    'fee_staff',
    'keterangan',
    'stok',
    'stok_max',
    'stok_min',
    'aktif'];

    protected $with = ['produk_katagori','satuan_besar','satuan_kecil'];

    public function getProdukSuplierAttribute(){
        return $this->suplier->pluck('id')->toArray();
    }

    public function produk_katagori()
    {
            return $this->belongsTo('App\model\MasterData\produkkatagori', 'katagori_item_id');
    }

    public function satuan_besar()
    {
            return $this->belongsTo('App\model\MasterData\satuanbesar', 'satuan_besar_id');
    }

    public function satuan_kecil()
    {
            return $this->belongsTo('App\model\MasterData\satuankecil', 'satuan_kecil_id');
    }

    //protected $with = ['suplier','suplier_produkitem'];

    public function suplier()
    {
        return $this->belongsToMany('App\model\MasterData\Suplier','produk_suplier','produk_item_id','suplier_id');
    }

}
