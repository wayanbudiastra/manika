<?php

namespace App\model\Pembayaran;

use Illuminate\Database\Eloquent\Model;

class PembayaranDetil extends Model
{
    //
    protected $table = 'pembayaran_detil';

        protected $fillable = [
            'id',
            'pembayaran_id',
            'transaksi',
            'kode_item',
            'nama_item',
            'katagori_item',
            'qty',
            'diskon',
            'harga_jual',
            'payer_net',
            'pasien_net',
            'subtotal',
            'aktif',
            'users_id'
        ];
}
