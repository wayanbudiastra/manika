<?php

namespace App\Http\Controllers\MasterData;

use App\User;
use App\model\MasterData\ProdukItem;
use App\model\MasterData\SatuanKecil;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\ProdukItemRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;



class SatuanKecilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $satuankecil;

    public function __construct(SatuanKecil $satuankecil)
    {
        $this->satuankecil = $satuankecil;
    }
    public function index()
    {
        //
        $row  = $this->satuankecil->orderBy('id', 'desc')->paginate(200);
        // dd($row);
 
           return view('masterData.satuankecil.index')->with([
                 'data'             => $row,
                 'title'            => 'Data Satuan Kecil',
                 'subtitle'         => 'List Satuan Kecil',
                 'no'               => '0',
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {
            $validator = Validator::make(request()->all(), [
                'nama_satuan_kecil' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/satuankecil')->with('gagal', '<p>' . $message->first('nama_satuan_kecil') . '</p>');
            }
            SatuanKecil::create($request->all());

            return redirect('/satuankecil')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . SatuanKecilController::class . ' method : create | ' . $e);

            return redirect('/satuankecil')->with('gagal', 'Data Gagal di input');
        }        
        
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
        $find = $this->satuankecil->find($id);
            return view('masterdata.satuankecil.edit')->with([
                'data'      => $find,
                'title'    => 'Edit Satuan Kecil',
                'subtitle' => 'Form Satuan Kecil',

            ]);
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
        try {
            $validator = Validator::make(request()->all(), [
                'nama_satuan_kecil' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/satuankecil')->with('gagal', '<p>' . $message->first('nama_satuan_kecil') . '</p>');
            }
            $data = SatuanKecil::find($id);
            $data->update($request->all());
            return redirect('/satuankecil')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . SatuanKecilController::class . ' method : edit | ' . $e);

            return redirect('/satuankecil')->with('gagal', 'Data Gagal di Edit');
        }        
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
