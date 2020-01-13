<?php

    namespace App\model\MasterData;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Spesialis extends Model
    {

        protected $table = 'spesialis';
        /**
         * @var array
         */
        protected $fillable = [
            'nama_spesialis',
            'keterangan',
            'aktif',
        ];

    }