<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\model\Pasien;
use Illuminate\Support\Facades\Crypt;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data= Pasien::orderby('nocm','DESC')->paginate(200);
       // dd($data);
       return view('pasien.index',['data'=>$data,'no'=>0,'subtitle'=>'Pasien List','title'=>'Data Pasien']); 
    }

     public function getdatapasien(){
        $data = Pasien::select('pasien.*');
        //dd($data);
        return \DataTables::eloquent($data)
        ->addColumn('tanggal_indo',function($d){
            return tgl_indo($d->tgl_lahir);
        })
        ->addColumn('usia', function ($x) {
                return hitung_usia($x->tgl_lahir);
            })
        ->addColumn('aksi',function($x){
            $id = Crypt::encrypt($x->id);
            // $aksi = '<a href={{url("/pasien/"'.$id.'"/edit")}} class="btn btn-warning btn-xs">Update</a>';
            return  $id;
        })
        ->rawColumns(['tanggal_indo','usia','aksi'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pasien.tambah',['no'=>0,'subtitle'=>'Pasien List','title'=>'Data Pasien']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function do_create(Request $request)
    {
        //
         $nocm =maxnocm();
         $request->request->add(['nocm'=>$nocm]);
         $data = Pasien::create($request->all());
        //  return $request->all();
        return redirect('/pasien')->with('sukses', 'Data Berhasil di input');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = Pasien::where('nama', 'like', "%" . $cari . "%")->get();
        // where('nocm', 'like', "%" . $cari . "%")->get();
        //dd($data);
        // mengirim data data ke view index
       return view('pasien.index', ['data' => $data, 'no' => 0, 'subtitle' => 'Pasien List', 'title' => 'Data Pasien']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = Pasien::find($idx);
         //dd($data);
        return view('pasien/edit',['data' => $data,'subtitle'=>'Data Pasien','title'=>'Edit Pasien']);
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
        //
          $data = Pasien::find($id);
        $data->update($request->all());

        return redirect('/pasien')->with('sukses', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
