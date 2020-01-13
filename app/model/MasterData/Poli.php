<?php

    namespace App\model\MasterData;


    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Poli extends Model
    {

        protected $table = 'poli';
        /**
         * @var array
         */
        protected $fillable = [
            'id',
            'nama_poli',
            'keterangan',
            'aktif',
            'created_at',
            'updated_at',
        ];

        public function registrasi1()
        {
                 return $this->hasMany('App\model\Registrasi1');
        } 

    }