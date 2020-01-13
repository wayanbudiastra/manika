<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Registrasi1 extends Model
{
    //
    protected $table = 'registrasi1';
    protected $fillable = ['id',
    'periode',
    'no_registrasi',
    'jenis_registrasi_id',
    'poli_id',
    'pasien_id',
    'ruangan_id',
    'dokter_id',
    'rujukan',
    'keterangan',
    'tgl_reg',
    'aktif',
    'iscencel',
    'users_id',
    'create_at','update_at'];

    public function poli()
    {
        return $this->belongsTo('App\model\MasterData\Poli');
    }

    public function pasien()
    {
        return $this->belongsTo('App\model\Pasien');
    }

    public function dokter()
    {
        return $this->belongsTo('App\model\MasterData\Dokter');
    }

    // relasi dengan data pembayaran
    public function pembayaran()
    {
    	return $this->hasOne('App\model\Pembayaran\Pembayaran');
    }
}
