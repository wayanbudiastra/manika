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

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $data = penerimaan::where('aktif','N')->orWhere('posting','N')->get();
        //dd($data);
        return view('inventory.retur.index',[
            'data' => $data,
            'no' => 0,
            'subtitle'=>'Data Penerimaan',
            'title'=>'List Penerimaan Produk']);

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
            return view('inventory.retur.paginate',
                ['data' => $data,
                 'row' => $row,
                 'total' => $total,
                 'no' => 0,
                 'cekposting' => $cekposting
                ]);
        }

        return view('inventory.retur.edit', ['data' => $data,
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
