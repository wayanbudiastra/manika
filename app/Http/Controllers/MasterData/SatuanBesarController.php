<?php

namespace App\Http\Controllers\MasterData;

use App\User;
use App\model\MasterData\ProdukItem;
use App\model\MasterData\SatuanBesar;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\ProdukItemRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class SatuanBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $satuanbesar;

    public function __construct(SatuanBesar $satuanbesar)
    {
        $this->satuanbesar = $satuanbesar;
    }

    public function index()
    {
        //
        $row  = $this->satuanbesar->orderBy('id', 'desc')->paginate(200);
        // dd($row);
 
           return view('masterData.satuanbesar.index')->with([
                 'data'             => $row,
                 'title'            => 'Data Satuan Besar',
                 'subtitle'         => 'List Satuan Besar',
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
                'nama_satuan_besar' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/satuanbesar')->with('gagal', '<p>' . $message->first('nama_satuan_besar') . '</p>');
            }
            SatuanBesar::create($request->all());

            return redirect('/satuanbesar')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . SatuanBesarController::class . ' method : create | ' . $e);

            return redirect('/satuanbesar')->with('gagal', 'Data Gagal di input');
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
        $find = $this->satuanbesar->find($id);
            return view('masterdata.satuanbesar.edit')->with([
                'data'      => $find,
                'title'    => 'Edit Satuan besar',
                'subtitle' => 'Form Satuan besar',

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
                'nama_satuan_besar' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/satuanbesar')->with('gagal', '<p>' . $message->first('nama_satuan_besar') . '</p>');
            }
            $data = SatuanBesar::find($id);
            $data->update($request->all());
            return redirect('/satuanbesar')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . SatuanBesarController::class . ' method : edit | ' . $e);

            return redirect('/satuanbesar')->with('gagal', 'Data Gagal di Edit');
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
