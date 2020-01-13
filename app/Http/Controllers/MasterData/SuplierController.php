<?php

namespace App\Http\Controllers\MasterData;

use App\model\MasterData\Suplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\SuplierRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Suplier $suplier)
    {
        $this->suplier = $suplier;
    }

    public function index()
    {
        //
        $row    = $this->suplier->orderBy('id', 'desc')->paginate(100);

        //dd($row);
            return view('masterData.suplier.index')->with([
                'data'     => $row,
                'title'    => 'Data Suplier',
                'subtitle' => 'List Suplier',
                'no'       => '0',
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
                'nama_suplier' => 'required'
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/suplier')->with('gagal', '<p>' . $message->first('nama_suplier') . '</p>');
            }
            Suplier::create($request->all());

            return redirect('/suplier')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . ProdukItemController::class . ' method : create | ' . $e);

            return redirect('/suplier')->with('gagal', 'Data Gagal di input');
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
        $find = $this->suplier->find($id);
        return view('masterData.suplier.edit')->with([
            'data'     => $find,
            'title'    => 'Edit Spesialis',
            'subtitle' => 'Form Spesialis',

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
                'nama_suplier' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/suplier')->with('gagal', '<p>' . $message->first('nama_suplier') . '</p>');
            }
            $data = Suplier::find($id);
            $data->update($request->all());
            return redirect('/suplier')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . SuplierController::class . ' method : edit | ' . $e);

            return redirect('/suplier')->with('gagal', 'Data Gagal di Edit');
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
