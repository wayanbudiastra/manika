<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\model\Pasien;
use \App\model\Registrasi1;
//use \App\model\Dokter;
// use \App\model\Poli;
use \App\User;
use Illuminate\Support\Facades\Crypt;
use App\model\MasterData\Dokter;
use App\model\MasterData\Poli;


class Registrasi1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data= Pasien::orderby('nocm','DESC')->paginate(200);
       // dd($data);
       return view('registrasi.index',['data'=>$data,'no'=>0,'subtitle'=>'Pasien List','title'=>'Registrasi Pasien']); 
    }

     public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        if($cari == ""){
            return redirect('/registrasi')->with('gagal', 'data tidak ditemukan');
        }else{

        // mengambil data dari table pegawai sesuai pencarian data
        $data = Pasien::where('nama', 'like', "%" . $cari . "%")->
                orWhere('nocm', 'like', "%" . $cari . "%")->get();
         return view('registrasi.index', ['data' => $data, 'no' => 0, 'subtitle' => 'Pasien List', 'title' => 'Registrasi Pasien']); 
            }
    }

    public function add_reg($id){
        $idx = Crypt::decrypt($id);
        $data = Pasien::find($idx);
        $dokter = Dokter::where('aktif','=','Y')->get();
        $poli = Poli::where('aktif','=','Y')->get();
         //dd($dokter);
        $periode = GetPeriode(); 
        return view('registrasi.add_reg',['p' => $data,
            'd'=>$dokter,
            'pol'=>$poli,
            'noreg'=>  max_noreg($periode),
            'subtitle'=>'Data Pasien',
            'title'=>'Add Registrasi Pasien']);
    }
  public function new(){
    
        
       
        $dokter = Dokter::where('aktif','=','Y')->get();
        $poli = Poli::where('aktif','=','Y')->get();
         //dd($dokter);
        $periode = GetPeriode(); 
        return view('registrasi.add_reg_new',[
            'd'=>$dokter,
            'pol'=>$poli,
            'noreg'=>  max_noreg($periode),
            'subtitle'=>'Data Pasien',
            'title'=>'Add Registrasi Pasien']);
    
  }

     public function list(){
        
        $data = Registrasi1::where('aktif','=','Y')->get();
        //dd($data);
       
        return view('registrasi.list',['data' => $data,'no' => 0,
            'subtitle'=>'Data Registrasi',
            'title'=>'List Registrasi Pasien']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        //
        $per = GetPeriode();
        $request->request->add(['no_registrasi' => max_noreg(),
                                'tgl_reg'=> date('Y-m-d'),
                                'users_id' => auth()->user()->id,
                                'periode' => $per]);

        
         $data = Registrasi1::create($request->all());
        //  return $request->all();
        return redirect('/registrasi/list')->with('sukses', 'Data Berhasil di input');
    }

    public function create_new(Request $request)
    {
        //reg pasien & Registrasi 
        try{
        $pasien = new Pasien;
        $pasien->nocm = maxnocm();;
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->pendidikan = $request->pendidikan;
        $pasien->identitas = $request->identitas;
        $pasien->no_identitas = $request->no_identitas;
        $pasien->no_telp = $request->no_telp;
        $pasien->save();

        //dd($pasien);
        $per = GetPeriode();  
        $registrasi = new Registrasi1;
        $registrasi->no_registrasi = max_noreg();
        $registrasi->pasien_id = $pasien->id;
        $registrasi->dokter_id = $request->dokter_id;
        $registrasi->poli_id = $request->poli_id;
        $registrasi->keterangan = $request->keterangan;
        $registrasi->tgl_reg = date('Y-m-d');
        $registrasi->users_id = auth()->user()->id;
        $registrasi->periode = $per;
        $registrasi->save();
        //dd($registrasi);
        return redirect('/registrasi/list')->with('sukses', 'Data Berhasil di input');
        }
        catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : create | ' . $e);

        return redirect('/registrasi/list')->with('gagal', 'Data Gagal di input');
            }       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cencel(Request $request, $id)
    {
        //
        try{
              $data = Registrasi1::find($id);
              $request->request->add(['aktif'=>'N',
             'iscencel'=>'Y']);
             
             $data->update($request->all());
            return redirect('/registrasi/list')->with('sukses', 'Data Berhasil di batalkan');

        } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . RegistrasiController::class . ' method : create | ' . $e);

                return redirect('/registrasi')->with('gagal', 'Data Gagal di batalkan');
            }
        
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $idx = Crypt::decrypt($id);
       $data = Registrasi1::find($idx);
       $dokter = Dokter::where('aktif','=','Y')->get();
       $poli = Poli::where('aktif','=','Y')->get();
       //dd($data);
        return view('registrasi.edit', ['data' => $data,
            'd'=> $dokter,
            'pol'=> $poli,
         'title' => 'Edit Registrasi', 
         'subtitle' => 'Form Registrasi']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
               $data = Registrasi1::find($id);
                $data->update($request->all());
                return redirect('/registrasi/list')->with('sukses', 'Data Berhasil di Edit');

        } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . RegistrasiController::class . ' method : create | ' . $e);

                return redirect('/registrasi')->with('gagal', 'Data Gagal di update');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cek()
    {
        //
        $id= max_noreg();
        dd($id);
    }
}
