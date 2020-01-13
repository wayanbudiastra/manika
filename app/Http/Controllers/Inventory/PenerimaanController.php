<?php

namespace App\Http\Controllers\Inventory;

    use  App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\SatuanBesar;
    use App\model\Inventory\Penerimaan;
    use App\model\Inventory\Penerimaan_detil;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Suplier;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $kode = Penerimaan::max('nomor_penerimaan');
         $nomor_penerimaan = nomor_penerimaan($kode);
         $suplier = Suplier::where('aktif','Y')->get();

         return view('inventory.penerimaan.add',[
            'nomor_penerimaan' => $nomor_penerimaan,
            'suplier' => $suplier,
            'no' => 0,
            'subtitle'=>'Data Add Penerimaan',
            'title'=>'List Add Penerimaan Produk']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  $request->request->add(['users_id' => auth()->user()->id,
        //              'tgl_add' => date('Y-m-d'),
        //             'jam_add' => date('H:i:s')]);
        // $data = $request->all();
        // dd($data);
         try {
                $validator      = Validator::make(request()->all(), [
                    'suplier_id'         => 'required|numeric'

                ]);
                $attributeNames = array(
                    'suplier_id'             => 'Pilih Suplier'
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/penerimaan')->with('gagal',
                        '<p>' . $message->first('suplier_id') . '</p>'
                    );
                }

                $request->request->add(['users_id' => auth()->user()->id,
                    'tgl_add' => date('Y-m-d'),
                    'jam_add' => date('H:i:s')]);
                Penerimaan::create($request->all());
              return redirect('/penerimaan')->with('sukses', 'Data Berhasil di input');
            } 
            catch (\Exception $e) {
                // store errors to log
            \Log::error('class : ' . PenerimaanController::class . ' method : create | ' . $e);

            return redirect('/penerimaan')->with('gagal', 'Data Gagal di input');
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
    public function edit($id,Request $request)
    {
        //
        $idx = Crypt::decrypt($id);
        $data = Penerimaan::find($idx);
        $row = Penerimaan_detil::where('penerimaan_id',$idx)->get();
        $cekposting = Penerimaan_detil::where('penerimaan_id',$data->id)->where('aktif','N')->count();
        $total = Penerimaan_detil::where('penerimaan_id',$data->id)->sum("subtotal");
        //dd($row);

        if($request->ajax()){
            return view('inventory.penerimaan_detil.paginate',
                ['data' => $data,
                 'row' => $row,
                 'total' => $total,
                 'no' => 0,
                 'cekposting' => $cekposting
                ]);
        }

        return view('inventory.penerimaan.edit', ['data' => $data,
            'row' => $row,
            'no' => 0,
            'total' => $total,
            'title' => 'Add Item Detil penerimaan',
            'subtitle' => 'List Item Detil penerimaan',
            'cekposting' => $cekposting
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
