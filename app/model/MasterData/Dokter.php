<?php

    namespace App\model\MasterData;

    use Illuminate\Database\Eloquent\Model;

    class Dokter extends Model
    {
        //
        protected $table = 'dokter';

        protected $fillable = [
            'id',
            'users_id',
            'nik',
            'nama_dokter',
            'email',
            'no_telp',
            'alamat',
            'tgl_lahir',
            'tempat_lahir',
            'spesialis_id',
            'subspesialis_id',
            'aktif'
        ];

        protected $with = ['spesialis', 'sub_spesialis'];

        public function spesialis()
        {
            return $this->belongsTo('App\model\MasterData\Spesialis', 'spesialis_id');
        }

        public function sub_spesialis()
        {
            return $this->belongsTo('App\model\MasterData\SubSpesialis', 'subspesialis_id');
        }

          public function registrasi1()
            {
            return $this->hasMany('App\model\Registrasi1');
            } 
    }
