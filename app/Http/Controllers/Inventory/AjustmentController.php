<?php

namespace App\Http\Controllers\Inventory;

    use App\model\Inventory\Ajustment;
    use App\model\MasterData\ProdukKatagori;
    use App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\SatuanBesar;
    use App\model\Inventory\Kartustok;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Suplier;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class AjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        $row    = ProdukItem::orderBy('id', 'desc')->paginate(100);
        
            return view('inventory.ajustment.index')->with([
                'data'     => $row,
                'satuanbesar' => $satuanbesar,
                'satuankecil' => $satuankecil,
                'produkkatagori' => $produkkatagori,
                'title'    => 'Data Produk Ajustment',
                'subtitle' => 'List Produk Ajustment',
                'no'       => '0',
            ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table produk sesuai pencarian data
        $data = ProdukItem::where('kode', 'like', "%" . $cari . "%")->
        orWhere('nama_item', 'like', "%" . $cari . "%")->get();
        
        // mengirim data data ke view index
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        // $row    = $this->produkitem->where('kode', 'like', "%" . $cari . "%")->
        // orWhere('nama_item', 'like', "%" . $cari . "%")->get();

        //dd($produkkatagori);
        return view('inventory.ajustment.index')->with([
                'data'     => $data,
                'satuanbesar' => $satuanbesar,
                'satuankecil' => $satuankecil,
                'produkkatagori' => $produkkatagori,
                'title'    => 'Data Produk Item',
                'subtitle' => 'List Produk Item',
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
        try {
            $validator      = Validator::make(request()->all(), [
                'qty'       => 'required|numeric',
            ]);
            $attributeNames = array(
                'qty'       => 'Kuantitas',
                
            );
            $validator->setAttributeNames($attributeNames);
            if ($validator->fails()) {
                $message = $validator->errors();
                return   response()->json([
                    'success' => false,
                    'message' => '<p>' . $message->first('qty') . '</p>',
                ], 433);
            }
                Ajustment::create([
                    'tgl_ajust'=> $request->tgl_ajust,
                    'produk_item_id'=> $request->id,
                    'jenis_ajust'=> $request->aktif,
                    'qty'=> $request->qty,
                    'keterangan'=> $request->keterangan,
                    'users_id'=> auth()->user()->id,
                ]);

                $findproduk = ProdukItem::where('id', '=', $request->id)->first();
                $stok_awal = $findproduk->stok;
                // dd($findproduk); 

                if($request->aktif == 'In'){
                    $stok_akhir = $stok_awal + $request->qty; 
                    $stok_keluar = 0;
                    $stok_masuk = $request->qty;
                }else{
                     $stok_akhir = $stok_awal - $request->qty; 
                     $stok_keluar = $request->qty;
                     $stok_masuk = 0;
                    }
                   
                //update data produk
                ProdukItem::where('id',$findproduk->id)
                            ->update([
                                'stok'=>$stok_akhir,
                            ]);
                
                $kartustok = new KartuStok;
                $kartustok->periode = GetPeriode();
                $kartustok->produk_item_id = $findproduk->id;
                $kartustok->stok_awal = $stok_awal;
                $kartustok->stok_masuk = $stok_masuk;
                $kartustok->stok_keluar = $stok_keluar;
                $kartustok->stok_akhir = $stok_akhir;
                if($request->aktif == 'In'){
                    $kartustok->transaksi = "PENERIMAAN";
                    $kartustok->keterangan = "Stok barang ajustment ditambah ";
                }else{
                    $kartustok->transaksi = "PENGELUARAN";
                    $kartustok->keterangan = "Stok barang ajustment dikurangi ";
                }
            
                $kartustok->users_id = auth()->user()->id;
                $kartustok->save();
    
                return redirect('/ajustment')->with('sukses', 'Data Berhasil di input');
                // return response()->json([
                //     'success' => true,
    
                //     'message' => "Data Ajustment Berhasil di input"
                // ], 200);
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . AjustmentController::class . ' method : create | ' . $e);

                // return redirect(back())->with('gagal', 'Data Gagal di input');
                return response()->json([
                    'success' => false,
    
                    'message' => "Data Item Gagal di Input"
                ], 500);
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
        // $idx = Crypt::decrypt($id);
        $data = ProdukItem::findOrFail($id);
        $ajustment = Ajustment::where('produk_item_id', $data->id)->orderBy('id', 'desc')->paginate(100);
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get()->toArray();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get()->toArray();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get()->toArray();
        $maping = $data->getProdukSuplierAttribute();
        $list_suplier = Suplier::pluck('nama_suplier','id'); 
        // dd($ajustment);

        //dd($maping); exit;
        return view('inventory.ajustment.edit')->with([
             'data' => $data,
             'ajustment' => $ajustment,
             'maping' => $maping,
             'list_suplier' => $list_suplier,
             'satuanbesar' => $satuanbesar,
             'satuankecil' => $satuankecil,
             'produkkatagori' => $produkkatagori,
             'title'    => 'Data Produk Ajustment',
             'subtitle' => 'List Produk Ajustment',
             'no'       => '0',
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
