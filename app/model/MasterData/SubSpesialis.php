<?php

    namespace App\model\MasterData;


    use App\Domain\Entities\Entities;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class SubSpesialis extends Model
    {

        protected $table = 'sub_spesialis';
        /**
         * @var array
         */
        protected $fillable = [
            'spesialis_id',
            'nama_spesialis',
            'keterangan',
            'aktif',
        ];
        protected $with = ['spesialis'];

        public function spesialis()
        {
            return $this->belongsTo('App\model\MasterData\Spesialis', 'spesialis_id');
        }
    }